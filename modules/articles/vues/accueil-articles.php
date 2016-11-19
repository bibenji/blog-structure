<div class="row">
   
    <div class="large-12 columns">
    		    	    	    
    <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
      <ul class="orbit-container">
        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
        <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
        
        <?php foreach($randArts as $one_rand) { ?>
        
        <li class="is-active orbit-slide">
        <a href="<?php echo $one_rand['id']; ?>-<?php echo $one_rand['slug']; ?>">

          <img class="orbit-image" src="ressources/pics_articles/<?php echo $one_rand['picture']; ?>" alt="Space">
            <figcaption class="orbit-caption"><?php echo $one_rand['titre']; ?></figcaption>
        </a>
        </li>
          
        <?php } ?>
               
               
                
      </ul>
      <!--
      <nav class="orbit-bullets">
        <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
        <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
        <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
        <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
      </nav>
      -->

    </div>
               
    </div>
    
</div>

<br />

<div class="section">Articles les plus lus</div>

<!-- affichage articles les plus lus -->
<?php
$largeurs = array(6,3,3,3,3,6);
$row_or_not = array(1,0,0,1,0,0);

for ($i = 0; $i < 6; $i = $i + 1)
{
    if (isset($bestArts[$i]))
    {
        if ($row_or_not[$i])
        { ?>
            <div class="row">
        <?php } ?> 
            
        <div class="large-<?php echo $largeurs[$i]; ?> column">        
            <a href="<?php echo $bestArts[$i]['id']; ?>-<?php echo $bestArts[$i]['slug']; ?>" class="link-article">
                <div class="one-art">
                    <p>
                        <img src="ressources/pics_articles/<?php echo $bestArts[$i]['picture']; ?>" />
                        <br />
                        <span class="tit-art tit-large-<?php echo $largeurs[$i]; ?>">
                            <?php echo $bestArts[$i]['titre']; ?>
                        </span>

                        <?php if ($largeurs[$i] == 3) { ?>
                            <br /><span class="descri-art"><?php echo strip_tags(substr($bestArts[$i]['article'], 0, 150)."..."); ?></span>
                        <?php } ?>

                        <br />

                        <span class="info-art">
                            Publié le <?php echo $Arts[$i]['date_publication']; ?>, dans <span class="la-cat-info"><?php echo $Arts[$i]['categorie']; ?></span>
                        </span>
                    </p>
                </div>
            </a>         
        </div>
        
        <?php
        if (!isset($row_or_not[$i+1]) OR ($row_or_not[$i+1]))
        { ?>
            </div>
        <?php }
    }
    else
    { ?>
        </div>
<?php
    }
}
?>

<div class="section">Derniers articles publiés</div>
<!-- affichage derniers articles publiés -->
<?php
$largeurs = array(3,3,3,3,3,3,3,3);
$row_or_not = array(1,0,0,0,1,0,0,0);

for ($i = 0; $i < 8; $i = $i + 1) {
    if (isset($Arts[$i])) {
        if ($row_or_not[$i]) {
            echo '<div class="row arts_pub">';
        }
    ?>
    <div class="large-<?php echo $largeurs[$i]; ?> column">        
        <a href="<?php echo $Arts[$i]['id']; ?>-<?php echo $Arts[$i]['slug']; ?>" class="link-article">
            <div class="one-art">
                <p>
                <img class="lpuba_img" src="ressources/pics_articles/<?php echo $Arts[$i]['picture']; ?>" />
                <br />
                <div class="tit-art"><?php echo $Arts[$i]['titre']; ?></div>
                
                <?php if ($largeurs[$i] == 333) { ?>
                <br />
                <span class="descri-art"><?php echo strip_tags(substr($Arts[$i]['article'], 0, 150)."..."); ?></span>
                <?php } ?>
                                
                <span class="info-art">
                Publié le <?php echo $Arts[$i]['date_publication']; ?>, dans 
                <span class="la-cat-info">                   
                    <?php echo $Arts[$i]['categorie']; ?>    
                </span>
                
                </span>
                </p>
            </div>
        </a>         
    </div>
    <?php
        if (!isset($row_or_not[$i+1]) OR ($row_or_not[$i+1])) {
            echo '</div>';
        }
    }
    else echo '</div>';
}
?>

<br />

<div class="row">
    <div class="large-6 column">
        <a href="modules/redirection/redirection.php?redirection=24"><img src="images/large-pub-69p.png" /></a>
    </div>
    <div class="large-6 column">
        <a href="tous">
        <img src="images/right-arrow.png" />
        </a>
    </div>
</div>

<br />
