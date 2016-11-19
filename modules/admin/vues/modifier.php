<?php
include('modules/admin/modeles/slugify.php');
?>

<h2>Modifier les articles</h2>
<table>
<thead>
    <tr><td>Titre de l'article</td><td>Actions</td></tr>
</thead>
<?php
foreach ($tous_les_articles as $unarticle)
{
    echo '<tr><td>';
    echo $unarticle['titre'];
    // echo '<br />'.slugify($unarticle['titre']).'</td>';
    echo '<td><a href="index.php?admin=admin&article_id='.$unarticle['id'].'">Modifier</a> - <a href="index.php?admin=supprimer&article_id='.$unarticle['id'].'">Supprimer</a></td>';
    echo '</td></tr>';
}
?>
</table>