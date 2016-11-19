<?php
function get_articles($offset, $limit)
{
global $bdd;
$offset = (int) $offset;
$limit = (int) $limit;
$req = $bdd->prepare('SELECT titre FROM articles LIMIT :offset, :limit');
$req->bindParam(':offset', $offset, PDO::PARAM_INT);
$req->bindParam(':limit', $limit, PDO::PARAM_INT);
$req->execute();
$billets = $req->fetchAll();
return $billets;
}