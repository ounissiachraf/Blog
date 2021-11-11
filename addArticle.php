<?php


try{
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$database->query("SET lc_time_names = 'fr_FR'");

$category=$_POST['category'];
$author=$_POST['author'];
$titre=$_POST['titre'];
$text=$_POST['contenue'];


$req=$database->prepare("INSERT INTO `post`(`Id`,`Title`, `Contents`, `CreationTimestamp`, `Author_Id`, `Category_Id`) VALUES (Null,?,?,Now(),?,?)");
$req->execute([$titre,$text,$author,$category]);

/*$requpdate=$database->prepare("SET @autoid :=0; 
UPDATE post SET id = @autoid:=(@autoid+1);
ALTER TABLE post AUTO_INCREMENT=1;");
$requpdate->execute();*/


header('Location:administration.php');
exit();
?>