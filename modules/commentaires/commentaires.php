<?php
    $commentsManager = new \modules\commentaires\CommentairesManager_PDO($bdd);
    
    if (
        (isset ($_POST['pseudo']))
        AND ($_POST['pseudo'] != '')
        AND (isset ($_POST['commentaire2']))
        AND ($_POST['commentaire2'] != '')
        )
    {
        $date = date("d/m/Y");
        $heureenvoi = date("H");
        $minenvoi = date("i");
        $heureetminenvoi = $heureenvoi . "h" . $minenvoi;
        $dateenvoi = $date . " à " . $heureetminenvoi;
        
        if (isset($_POST['mail']) AND $_POST['mail'] != '') $mail = $_POST['mail'];
        else $mail = '';
        
        $messComSaved = $commentsManager->saveComment($_GET['article'], $dateenvoi, $_POST['pseudo'], $mail, $_POST['commentaire2']);
        
    }

    $lescommentaires = $commentsManager->getComments();
    
    


    include('modules/commentaires/vues/all-comments.php');
?>