<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="modules/admin/css/styles.css" />
		<title>Administration d'<?php echo SITE_NAME; ?></title>
	</head>

	<body>
        
        <div id="barre-haut">
            <div class="col-g">
			<h2><?php echo SITE_NAME; ?></h2>
			<h1>Zone Administration</h1>
			</div>
			<div class="col-d">
			    <ul>
			        <li>
			            <a href="index.php?admin=admin">
                            <img src="modules/admin/images/ajouter.png" /><br />Ajouter un article
                        </a>
                    </li>
                    
			        <li>
			            <a href="index.php?admin=modifier">
			                <img src="modules/admin/images/modifier2.png" /><br />Modifier les articles
			             </a>
			         </li>
			         
			        <li>
                       <a href="index.php?admin=categories">
                           <img src="modules/admin/images/enconstruction2.png" /><br />Gérer les catégories
                        </a>
                    </li>
                    
                    <li>
                       <a href="index.php?admin=commentaires">
                           <img src="modules/admin/images/comments.png" /><br />Gérer les commentaires
                        </a>
                    </li>                    
                    
                    <li>
                        <a href="index.php?admin=newsletter">
                            <img src="modules/admin/images/newsletter.png" /><br />Gérer la newsletter
                        </a>
                    </li>
                    
                    <li>
                        <a href="index.php?admin=stats">
                            <img src="modules/admin/images/statistics.png" /><br />Afficher les stats
                        </a>
                    </li>
                    
			        <li>
                        <a href="index.php?admin=logout">
			                <img src="modules/admin/images/logout.png" /><br />Log out
			             </a>       
			         </li>
			    </ul>
			
            </div>
            <div class="one-clear"></div>
        </div>
        
        <div id="barre-bas">
        
            <div class="col-g">
                <h3>Evénements récents</h3>
                <dl>
                    <dt>To do</dt>
                    <dd>
                        <ul>
                            <li>Do 1</li>
                            <li>Do 2</li>
                            <li>Do 3</li>
                        </ul>                        
                    </dd>
                </dl>
                
                <ul>
                    <li>Dernier article publié</li>
                </ul>
                <ul>
                    <li>Dernier commentaire</li>
                </ul>
            </div>
            <div class="col-d">
               <div id="nice-barre"></div>
                <div id="contenu-admin">
                    <p><?php if (isset($info_mess)) echo $info_mess; ?></p>
                <?php include($content); ?>
                </div>
            
            </div>
            <div class="one-clear"></div>
        </div>
        
        <footer>
            www.<?php echo SITE_NAME; ?>.fr
        </footer>


</body>
</html>
