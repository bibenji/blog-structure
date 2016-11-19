<?php
ob_start();
session_destroy();
?>
<h2>Logout</h2>
<p>Vous avez bien été déconnecté...</p>
<a href="index.php">Retour</a>

<?php
ob_end_flush();
?>