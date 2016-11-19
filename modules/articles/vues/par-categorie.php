<h3 class="descri-cat">Tous les articles<?php if ($_GET['categorie'] != 0) echo ' "'.$lesarticles[0]['categorie'].'"'; ?></h3>
<?php
    foreach ($lesarticles as $article) { ?>
        <a href="<?php echo $article['id']; ?>-<?php echo $article['slug']; ?>" class="cat-link-article">
        <div class="row">
           <div class="large-5 columns">
               <img src="ressources/pics_articles/<?php echo $article['picture']; ?>" />
           </div>
           <div class="large-7 columns">
               <span class="cat-tit-art"><?php echo $article['titre']; ?></span>
               <br />
               <span class="cat-descri-art"><?php echo strip_tags(substr($article['article'], 0, 200)."..."); ?></span>
               <br /><br />
               <span class="cat-infos-art">
               Publié le <?php echo $article['date_publication']; ?>, dans <span class="lacat"><?php echo $article['categorie']; ?>.</span>
               <br />
               Lu <?php echo $article['compteur']; ?> fois.
               </span>
           </div>
        </div>
        </a>
    <?php }
    
    include('modules/articles/vues/pagination.php');

?>