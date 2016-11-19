<?php
    $note = (int) $_GET['lanote'];
    $idart = (int) $_GET['lid'];
    $lip = $_GET['lip'];

    include('../../config/config_bd.php');
    require('../../modules/articles/ArticlesManager_PDO.class.php');
    $manager2 = new \modules\articles\ArticlesManager_PDO($bdd);

    $rep = $manager2->saveNote($idart, $note, $lip);

    echo $rep;
    
    // echo 'la note est : ' . $note . ' et l\'id de l\'article : ' . $idart . ' avec l\'ip : ' . $lip;
?>