<?php
$ladate = date('Y-m-d');
// echo $ladate;
?>
 
  <form method="post" action="index.php?admin=admin" enctype="multipart/form-data" id="form-ajout">
   <h2><?php echo $texte = (empty($art_to_modif['id']) ? 'Ajouter un article' : 'Modifier un article'); ?></h2>
    <div id="formleft">
              
       <input type="hidden" name="article_id" value="<?php echo $art_to_modif['id']; ?>" />
        <input type="hidden" name="compteur" value="<?php echo $art_to_modif['compteur']; ?>" />
              
        <p>Titre de l'article :<br /><input type="text" name="titre" value="<?php echo $art_to_modif['titre']; ?>" /></p>

        <p>Texte :<br />
        <textarea name="article" cols="40" rows="40" /><?php echo $art_to_modif['article']; ?></textarea></p>
    </div>

    <div id="formright">
        <p>Catégorie :<br /><select name="categorie">
            
		    <option value="1" <?php if ($art_to_modif['categorie_id'] == 1) echo 'selected="selected"' ?>>Amour et Séduction</option>
		    <option value="2" <?php if($art_to_modif['categorie_id'] == 2) echo 'selected="selected"' ?>>Bien-être</option>
		    <option value="3" <?php if($art_to_modif['categorie_id'] == 3) echo 'selected="selected"' ?>>Sexualité</option>
		    <option value="4" <?php if($art_to_modif['categorie_id'] == 4) echo 'selected="selected"' ?>>Vie sociale</option>
            </select></p>

        <p>Keywords (tags) :<br /><input type="text" name="slug" disabled="disabled" /></p>
        
        <p>Illustration :<br />
        <?php if (!empty($art_to_modif['id'])) { ?>
        <img src="ressources/pics_articles/<?php echo $art_to_modif['picture']; ?>" />
        <input type="hidden" name="saved_image" value="<?php echo $art_to_modif['picture']; ?>" /><br />Remplacer cette image par une autre :<br />
        <?php } ?>
        <input type="file" name="image"></p>
        
        <p>Date de publication : <input type="text" name="date_publication" value="<?php echo $art_to_modif['date_publication']; ?>">
        <br />(Fournie automatiquement par le serveur.)</p>
        
        <p>Inline : <select name="inline" disabled="disabled">
		    <option>oui</option>
			<option>non</option>
        </select></p>
        
    </div>
    
    <div class="one-clear"></div>
    
    <div id="finform">
        <p><input type="submit" value="Valider"></p>
    </div>

</form>