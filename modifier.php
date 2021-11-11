<?php


try{
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$database->query("SET lc_time_names = 'fr_FR'");
if(isset($_GET['id']))
$id=$_GET['id'];
else
$id=$_POST['id'];

$req=$database->prepare("SELECT `Title`,`Name`,`FirstName`,`LastName`,post.`Contents` as text,DATE_FORMAT(post.`CreationTimestamp`,'%D %M %Y') as DATE, post.Id as idpost,`Author_Id`,post.Category_Id as catID
FROM `post`
INNER JOIN category
ON post.Category_Id = category.Id
INNER JOIN author
ON post.Author_Id=author.Id
WHERE post.Id=?");
$req->execute([$id]);
$items=$req->fetch();

$req1=$database->prepare("SELECT `Id`,`FirstName`,`LastName` FROM `author`
");
$req1->execute();
$authors=$req1->fetchAll();


$req2=$database->prepare("SELECT * FROM `category`
");
$req2->execute();
$categories=$req2->fetchAll();

$main='modifier.phtml';

include "layout.phtml";
?>