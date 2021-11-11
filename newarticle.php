<?php


try{
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$req1=$database->prepare("SELECT `Id`,`FirstName`,`LastName` FROM `author`
");
$req1->execute();
$authors=$req1->fetchAll();


$req2=$database->prepare("SELECT * FROM `category`
");
$req2->execute();
$categories=$req2->fetchAll();

$main='newarticle.phtml';

include "layout.phtml";
?>