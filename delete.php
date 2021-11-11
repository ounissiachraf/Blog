<?php


try{
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$id=$_POST['id'];
$req=$database->prepare("DELETE FROM `post` WHERE `Id`=?");
$req->execute([$id]);
echo json_encode("success");

/*$requpdate=$database->prepare("SET @autoid :=0; 
UPDATE post SET id = @autoid:=(@autoid+1);
ALTER TABLE post AUTO_INCREMENT=1;");
$requpdate->execute();

$reqid=$database->prepare("SET @num := 0;
UPDATE post SET id = @num := (@num+1);");
$reqid->execute();*/




//header('Location:administration.php');
//exit();
?>