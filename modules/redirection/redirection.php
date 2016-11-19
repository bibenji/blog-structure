<?php

// header("Location: redirection.php?numid=".$_GET['urlid']);

include('../../config/config_bd.php');
	
	$req = $bdd->prepare('SELECT * FROM clicspubs WHERE id = ?');
	$req->execute(array($_GET['redirection']));
		
	while ($donnees = $req->fetch())
    {	
        $url = $donnees['link'];

        $nb_clics_pubsdubas = $donnees['nombre'];
        $nb_clics_pubsdubas++;
        
        $req = $bdd->prepare('UPDATE clicspubs SET nombre = ? WHERE id = ?');
        $req->execute(array($nb_clics_pubsdubas, $_GET['redirection']));
        $req->closeCursor();
    }

?>

<center>
    <p>Vous allez être redirigé...</p>
    <p>Si ce n'est pas le cas, cliquez-ici :</p>
    <?php        
        echo '<a href="' . $url . '"> ' . $url . '</a>';        
    ?>
</center>

<SCRIPT LANGUAGE="JavaScript">
	document.location.href="<?php echo $url; ?>"
</SCRIPT>