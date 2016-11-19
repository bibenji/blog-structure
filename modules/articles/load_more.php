<?xml version="1.0" encoding="UTF-8"?>
<table>
<?php   

    $debdeb = (int) $_GET['deb'];

    include('../../config/config_bd.php');
    require('../../modules/articles/ArticlesManager_PDO.class.php');
    $manager2 = new \modules\articles\ArticlesManager_PDO($bdd);
    $MoreArts = $manager2->getArticles($debdeb, 20);
    
    foreach ($MoreArts as $one) { ?> 
    
    <article>
        <id><?php echo $one['id']; ?></id>
        <picture><?php echo $one['picture']; ?></picture>
        <titre><?php echo $one['titre']; ?></titre>
        <contenu><?php
        echo strip_tags(mb_substr($one['article'], 0, 150, 'UTF-8')."...");
        // echo strip_tags(wordwrap($one['article'], 0, 150, ' ', false)."...");
                                
        ?></contenu>
        
    </article>
    <?php } ?>
</table>