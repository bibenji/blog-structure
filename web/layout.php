<!DOCTYPE html>

<html class="no-js" lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo SITE_NAME; ?></title>
        <link rel="stylesheet" href="css/foundation.css">
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="added_styles.css">
    </head>
    
    <body>
    
    <div class="menu-centered">
        <ul class="menu">
            <li><a href="accueil">Accueil</a></li>
            <li><a href="tous">Tous les articles</a></li>
            <li><a href="amour-et-seduction">Amour et séduction</a></li>
            <li><a href="bien-etre">Bien-être</a></li>
            <li><a href="sexualite">Sexualité</a></li>
            <li><a href="vie-sociale">Vie sociale</a></li>
            <li><a href="ebooks">E-Books</a></li>
            <li><a href="index.php?search=search">Rechercher&nbsp;<img id="ico-search" src="images/search.png" /></a></li>
        </ul>
    </div>  
  
	<div class="large-12" id="titre">	        
        <img src="<?php echo SITE_LOGO; ?>" />
	</div>
  
	<div class="row" id="main">
	
		<div class="large-12 medium-12 columns">
	    	
			<?php
                if (isset($_GET['ebooks']) AND $_GET['ebooks'] == 'ebooks') {
                    include('modules/ebooks/ebooks.php');
                }
                else {
                    include('modules/articles/articles.php');    
                }                
            ?>

		</div>

        <?php    		
		    if (isset($_GET['article']))
            {    
                include('web/includes/pub.php');	
                include('modules/commentaires/commentaires.php');
            }
        ?>
		
	</div>
	
	<footer class="footer">
	
        <div class="row" id="footer">

            <div class="large-3 columns">
                <h2>Réseaux sociaux</h2>
                <p><img src="images/ico-fb-blanc.png" />&nbsp &nbsp &nbsp<img src="images/ico-twitter-blanc.png" /></p>
            </div>

            <div class="large-3 columns">                
                <?php include('modules/newsletter/newsletter.php'); ?>                
            </div>

            <div class="large-3 columns">
                <h2>Site réalisé par</h2>
                <p><img src="images/about-me-blanc.png" /></p>
            </div>

            <div class="large-3 columns">
               <h2>Zone d'administration</h2>			
                <p><a class="button expand" href="index.php?admin=admin">Admin</a></p>
            </div>

        </div>
	
	</footer>
  
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
    
    <script src="js/main-js.js"></script>
    
  </body>
  
</html>