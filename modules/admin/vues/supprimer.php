<?php if (isset($_GET['article_id'])) { ?>
<p>Confirmez-vous la suppression de l'artice ?</p>
<form method="post" action="index.php?admin=supprimer">
   <input type="text" name="article_id" value="<?php echo $_GET['article_id']; ?>" />
    <input type="submit" value="Oui, supprimer l'article" />
</form>
<?php } ?>