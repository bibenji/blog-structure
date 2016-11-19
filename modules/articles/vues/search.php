<div id="result-search">
<h3 class="descri-cat">Effectuer une recherche</h3>
<form action="#" method="POST">
<div class="row">
<div class="large-6 columns">
<input type="text" name="keywords" value="<?php if(isset($_POST['keywords'])) echo $_POST['keywords']; ?>"/>
</div>
<div class="large-6 columns">
<input type="submit" class="button" value="Rechercher" />
</div>
<div class="row">
   <div class="large-12 large-offset-1 columns">
    <input type="checkbox" name="in_contenu" /> Rechercher également dans le contenu des articles
    </div>
</div>
</div>
</form>

<h3>Résultats de la recherche</h3>



<?php
if (!isset($resultats)) { ?>

Effectuez une recherche...

<?php } elseif (empty($resultats)) { ?>

Pas de résultats...

<?php } else {
$compte = count($resultats);
echo '<p>'.$compte.' résultat(s) correspond(ent) à votre recherche...</p>';

if ($compte == 20) echo '<p>Pour une recherche plus précise, affinez vos critères...</p>';
    
for ($i = 0; $i < $compte; $i++) {
    
if ($i % 2 == 0) {
    echo '<div class="row">';
}                                    
                                     
?>
    
      
      <div class="large-6 column">
      <a href="<?php echo $resultats[$i]['id']; ?>-<?php echo $resultats[$i]['slug']; ?>">
       <div class="large-6 column">          
           <img src="ressources/pics_articles/<?php echo $resultats[$i]['picture']; ?>" />
       </div>
       <div class="large-6 column">
            <?php echo $resultats[$i]['titre']; ?><br />    
            <span class="info-art">
                Publié le <?php echo $resultats[$i]['date_publication']; ?>, dans <span class="lacat"><?php echo $resultats[$i]['categorie']; ?></span><br />
            </span>
                       
       </div>
       </a>
       </div>
        
<?php
        
if ($i % 2 != 0) echo '</div><br />';


}
    
if ($compte % 2 != 0) echo '</div>';

}
?>

<br />
</div>
<br />