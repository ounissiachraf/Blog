<?php



try{
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$database->query("SET lc_time_names = 'fr_FR'");

$id=$_GET['post_id'];

$req=$database->prepare("SELECT `Title`,`Name`,`FirstName`,`LastName`,post.`Contents` as text,DATE_FORMAT(post.`CreationTimestamp`,'%D %M %Y') as DATE, post.Id as idpost
FROM `post`
INNER JOIN category
ON post.Category_Id = category.Id
INNER JOIN author
ON post.Author_Id=author.Id
WHERE post.Id=?");
$req->execute([$id]);
$items=$req->fetch();

$reqcomment=$database->prepare("SELECT `Contents`,`NickName`
FROM `comment`
WHERE Post_Id=?");
$reqcomment->execute([$id]);
$comments=$reqcomment->fetchAll();
$nbr=$reqcomment->rowCount();


$main='post.phtml';
include "layout.phtml";
?>