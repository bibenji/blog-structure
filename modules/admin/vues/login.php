<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="modules/admin/css/styles.css" />
		
		<title>Administration d'<?php echo SITE_NAME; ?></title>
	</head>

	<body>
	
	<div id="log-admin">
	<h1><?php echo SITE_NAME; ?></h1>
    <form method="post" action="index.php?admin=admin">
        <legend>Pannel Administration</legend>
        <input name="login" type="text" placeholder="login" />
        <input name="pass" type="password" placeholder="password" />
        <input type="submit" value="LOG IN" />
   </form>
       <p>
       Not an admin ?<br />
       <a href="index.php">Go back to <?php echo SITE_NAME; ?></a>
        </p>
   </div>
   
    </body>
    
</html>
