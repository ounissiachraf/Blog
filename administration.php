<?php



try{
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$database->query("SET lc_time_names = 'fr_FR'");

$req=$database->prepare("SELECT post.`Id` as ID, DATE_FORMAT(`CreationTimestamp`,'%D %M %Y') as DATE,`Title`,`FirstName`,`LastName`,`Name`
FROM `post`
INNER JOIN category
ON post.Category_Id = category.Id
INNER JOIN author
ON post.Author_Id=author.Id");
$req->execute();
$articles=$req->fetchAll();
$NBR=$req->rowCount();

$main='administration.phtml';

include "layout.phtml";

?>