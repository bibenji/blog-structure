<h2>Statistiques</h2>

<div class="one-graph">
<h3>Nombre de visiteurs par catégorie :</h3>

<?php

	$stmt = $bdd->query('
        SELECT SUM(compteur) AS compteur, categorie, categories.nom
        FROM articles
        INNER JOIN categories
        ON categorie = categories.id
        GROUP BY categorie
        ');
	//$arrAll = $stmt->fetchAll();

    while ($donnees = $stmt->fetch())
	{
		$taille = $donnees['compteur'] / 150;
		//echo $taille;
		echo '<div class="one_cat_stat col_'.strtolower(substr($donnees['nom'],0,3)).'"" style="height: ' . $taille . 'px"><span>';
        echo $donnees['nom'] . '<br />' . $donnees['compteur'];
	   echo '</span></div>';
    }
    
    $stmt->closeCursor();

?>
</div>

<div class="one-graph">
<h3>Nombre d'articles par catégories :</h3>

<?php
	$stmt = $bdd->query('
            SELECT a.categorie, c.nom, COUNT(a.id) AS compteur
            FROM articles AS a
            INNER JOIN categories AS c
            ON a.categorie = c.id
            GROUP BY a.categorie   
            ');
    //$arrAll = $stmt->fetchAll();
	
    while ($donnees = $stmt->fetch())
	{
		$taille = $donnees['compteur'] * 5;
		//echo $taille;
		echo '<div class="one_cat_stat col_'.strtolower(substr($donnees['nom'],0,3)).'"" style="height: ' . $taille . 'px"><span>';
		echo $donnees['nom'] . '<br />' . $donnees['compteur'];
        echo '</span></div>';
    }
    $stmt->closeCursor();

?>
</div>

<div class="one-graph">
<h3>Nombre de visiteurs par catégorie / nombre d'articles par catégorie</h3>
		
<?php
	$stmt = $bdd->query('
        SELECT a.categorie, c.nom, ROUND( SUM(a.compteur) / COUNT(a.id) ) AS super_stat
        FROM articles AS a
        INNER JOIN categories AS c
        ON a.categorie = c.id
        GROUP BY a.categorie
        ');
    //$arrAll = $stmt->fetchAll();
	
    while ($donnees = $stmt->fetch())
	{
		$taille = $donnees['super_stat'] / 10;
		//echo $taille;
		echo '<div class="one_cat_stat col_'.strtolower(substr($donnees['nom'],0,3)).'"" style="height: ' . $taille . 'px"><span>';
		echo $donnees['nom'] . '<br />' . $donnees['super_stat'];
        echo '</span></div>';
    }

    $stmt->closeCursor();
		
?>	
</div>

<div class="one-graph">
<h3>Nombre de visiteurs par articles (20 premiers résultats) :</h3>

<?php
   $stmt = $bdd->query('SELECT a.titre titre, c.nom categorie, CAST(a.compteur AS UNSIGNED) stat
        FROM articles a, categories c
        WHERE a.categorie = c.id
        ORDER BY stat DESC LIMIT 0, 20');

    while ($donnees = $stmt->fetch())
	{
		$taille = $donnees['stat'] / 10;
		//echo $taille;
		echo '<div class="one_lg_cat_stat col_'.strtolower(substr($donnees['categorie'],0,3)).'" style="width: ' . $taille . 'px">';
		echo $donnees['titre'].'<br />'.$donnees['stat'].'<br />'.$donnees['categorie'];
        echo '</div>';
    }

    $stmt->closeCursor();
?>
</div>

<div class="one-graph">
<h3>Articles les plus commentés (10 premiers résultats) :</h3>

<?php
   $stmt = $bdd->query('SELECT a.titre titre, ca.nom categorie, c.idarticle idarticle, COUNT(*) as nb_coms FROM commentaires c, articles a, categories ca WHERE c.idarticle = a.id AND ca.id = a.categorie GROUP BY idarticle ORDER BY nb_coms DESC LIMIT 0, 10');

    while ($donnees = $stmt->fetch())
	{
		$taille = $donnees['nb_coms']*10;
		//echo $taille;
		echo '<div class="one_lg_cat_stat col_'.strtolower(substr($donnees['categorie'],0,3)).'" style="width: ' . $taille . 'px">';
		echo $donnees['titre'].'<br />'.$donnees['nb_coms'].'<br />'.$donnees['categorie'];
        echo '</div>';
    }

    $stmt->closeCursor();
?>
</div>




