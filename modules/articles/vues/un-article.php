<div class="row">

<div class="large-8 columns">
   
    <div class="row">
        <div class="large-12 columns aff-un-article">
        <div id="social-link">
            <a href=""><img src="images/ico-fb.png" /></a>
            <a href=""><img src="images/ico-twitter.png" /></a>
            <a href=""><img src="images/ico-newsletter.png" /></a>
        </div>
        <h3><?php echo $article['titre']; ?></h3>					
        <p>
        <img src="ressources/pics_articles/<?php echo $article['picture']; ?>" alt="<?php echo $article['titre']; ?>" />
        <br />
        <span class="descri-art">
        <?php
         echo str_replace("THEIMAGE", "</span>", $article['article']);
        ?>    
        </p> <!-- sapn fermé dans l'echo -->
        <?php //echo nl2br($rpl);
        ?>
        </div>		
    </div>

    <div class="row">
       <div class="large-10 large-offset-1 columns">
        <?php include('modules/notation/notation.php'); ?>
        </div>
    </div>
	
</div>

<div class="large-4 columns">
   
    <?php
    foreach ($othersarticles as $autrearticle) {
    ?>
    <a href="<?php echo $autrearticle['id']; ?>-<?php echo $autrearticle['slug']; ?>" class="link-article">
    <div class="row">
    <div class="large-12 columns one-more-art">
    <img src="ressources/pics_articles/<?php echo $autrearticle['picture']; ?>" />
    <div class="tit-more-art">
        <span>
        <?php echo $autrearticle['titre']; ?>
        </span>
    </div>
    </div>
    </div>
    </a>
    
	<?php } ?>
    
</div>
	
</div>