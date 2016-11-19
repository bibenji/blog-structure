<?php
/*
function chargerClasse($classe) {
	
	// echo $classe . '.class.php';
	require $classe . '.class.php';
	// echo '../' . str_replace('\\', '/', $classe) . '.class.php';
	// require str_replace('\\', '/', $classe) . '.class.php';
}
*/

spl_autoload_register('chargerClasse');

$manager = new \modules\articles\ArticlesManager_PDO($bdd);

include('modules/articles/config/articles-config.php');

// PARTIE CONTROLEUR //
if (!isset($_GET['ledeb'])) $ledeb = 0;
else $ledeb = (int) $_GET['ledeb'];
    
if (isset($_GET['article']))
{
    $article = $manager->getUnArticle($_GET['article']);
    $manager->majCompteur($_GET['article'], $article['compteur']);
    $othersarticles = $manager->getOthersArticles(0, 8, $_GET['article'], $article['categorie_id']);
    include('modules/articles/vues/un-article.php');
}
elseif (isset($_GET['categorie']))
{    
    if ($_GET['categorie'] == 0) {
        $lesarticles = $manager->getArticles($ledeb, ARTS_PAR_PAGE);    
        $autotal = $manager->totalArticles();    
    }
    else {    
        $lesarticles = $manager->getArticles($ledeb, ARTS_PAR_PAGE, $_GET['categorie']);
        $autotal = $manager->totalArticles($_GET['categorie']);
    }
    include('modules/articles/vues/par-categorie.php');
}
elseif (isset($_GET['search']))
{
    if (isset($_POST['keywords'])) {
        if (isset($_POST['in_contenu'])) $in_contenu = $_POST['in_contenu'];
        else $in_contenu = null;
        //var_dump($in_contenu);
        $resultats = $manager->searchArts($_POST['keywords'], $in_contenu);
    }
    include('modules/articles/vues/search.php');
}
else // page d'accueil
{    
    $randArts = $manager->getRandArts(0, 5);
        
    $bestArts = $manager->getBestArticles(0, 6);
    // $bestArts = $manager->getRandArts(0, 6);
    
    $Arts = $manager->getArticles(0, 8); 
        
    include('modules/articles/vues/accueil-articles.php');
    
}

?>








