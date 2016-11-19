<?php
session_start();

if (isset($_POST['login']) AND $_POST['login'] == 'admin'
   AND isset($_POST['pass']) AND $_POST['pass'] == 'mdp')
{
    $_SESSION['logged'] = 'logged';
}
if (isset($_SESSION['logged']) AND $_SESSION['logged'] = 'logged')
{    
    switch ($_GET['admin'])
    {
        case 'admin':
        {
            include('modules/admin/modeles/slugify.php');
            if (
		          (isset ($_POST['article']) AND ($_POST['article'] != ''))
		          AND (isset ($_POST['titre']) AND ($_POST['titre'] != ''))
		          AND (isset ($_POST['categorie']) AND ($_POST['categorie'] != ''))		          
            ) {
                    if($_POST['date_publication'] == '') $_POST['date_publication'] = date('Y-m-d');
                    $_POST['slug'] = slugify($_POST['titre']);
                    
                    if ($_POST['compteur'] == '') $_POST['compteur'] = 0;
                    else unset($_POST['compteur']);
                    
                    $_POST['categorie'] = (int) $_POST['categorie'];
                    
                    if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
                    {
                        if ($_FILES['image']['size'] <= 1000000)
                        {
                            $infoimage = pathinfo($_FILES['image']['name']);
                            $extension_upload = $infoimage['extension'];
                            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                            if (in_array($extension_upload, $extensions_autorisees))
                            {
                                move_uploaded_file($_FILES['image']['tmp_name'], 'ressources/pics_articles/' .
                                $newname = basename($_FILES['image']['name']));
                                $_POST['picture'] = $newname;
                                
                                // problème avec cette ligne car des fois 'saved_image' est vide, à l'enregistrement d'un nouvel article...
                                if ($_POST['saved_image'] != '') unlink('ressources/pics_articles/'.$_POST['saved_image']);
                                
                            }
                        }
                    }
                    else
                    {
                        $_POST['picture'] = $_POST['saved_image'];
                    }
                unset($_POST['saved_image']);
                $manager = new \modules\articles\ArticlesManager_PDO($bdd);
                $info_mess = $manager->save($_POST);
            }
            
            if (isset ($_GET['article_id']))
            {
                $manager = new \modules\articles\ArticlesManager_PDO($bdd);
                $art_to_modif = $manager->getUnArticle($_GET['article_id']);
            }
            else
            {
                $art_to_modif = array(
                    'id' => '',
                    'titre' => '',
                    'article' => '',
                    'categorie_id' => '',
                    'categorie' => '',
                    'picture' => '',
                    'compteur' => '',
                    'date_publication' => ''
                );
            }
            
            $content = 'modules/admin/vues/ajouter.php';
            break;
        }
        case 'modifier':
        {
            $manager = new \modules\articles\ArticlesManager_PDO($bdd);
            $total_articles = (int) $manager->totalArticles();
            $tous_les_articles = $manager->getArticles(0, $total_articles);
            $content = 'modules/admin/vues/modifier.php';
            break;
        }
        case 'supprimer' :
            if (isset($_POST['article_id']))
            {
                $_POST['article_id'] = (int) $_POST['article_id'];
                $manager = new \modules\articles\ArticlesManager_PDO($bdd);
                $info_mess = $manager->supprimer($_POST['article_id']);
            }
            $content = 'modules/admin/vues/supprimer.php';
            break;
        case 'categories':
            $content = 'modules/admin/vues/categories.php';
            break;
        case 'commentaires':
            $content = 'modules/admin/vues/commentaires.php';
            break;
        case 'newsletter':
            $content = 'modules/admin/vues/newsletter.php';
            break;
        case 'stats':
            $content = 'modules/admin/vues/stats.php';
            break;   
        case 'logout':
            $content = 'modules/admin/vues/logout.php';
            break;   
        default:
            $content = 'modules/admin/vues/ajouter.php';            
    }
    
    include ('modules/admin/vues/zone-admin.php');
}
else
{
    include ('modules/admin/vues/login.php');
}