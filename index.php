<?php

try{
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$database->query("SET lc_time_names = 'fr_FR'");
$req=$database->prepare("SELECT `Title`,`Name`,`FirstName`,`LastName`,SUBSTRING(`Contents`,1,150) as content, DATE_FORMAT(`CreationTimestamp`,'%D %M %Y') as DATE , post.Id
FROM `post`
INNER JOIN category
ON post.Category_Id = category.Id
INNER JOIN author
ON post.Author_Id=author.Id
LIMIT 10");
$req->execute();
$articles=$req->fetchAll();

$main='index.phtml';

include "layout.phtml";
?>