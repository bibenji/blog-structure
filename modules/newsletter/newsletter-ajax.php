<?php

if (isset($_POST['email']) AND ($_POST['email'] != ""))
{
	$newmail = stripslashes($_POST['email']);
	include('../../config/config_bd.php');
		
    //On ajoute une entrée dans la table
	$req = $bdd->prepare('INSERT INTO mailnewsletter(id, mail) VALUES(:id, :mail)');
	
	$req->execute(array(
		'id' => '',
		'mail' => $_POST['email']
	));
	
    echo "Merci, vous êtes maintenant inscrit à notre newsletter !";
		
}
else
{
    echo "Echec";
}

?>