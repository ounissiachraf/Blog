<?php


try{
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


$id=$_POST['id'];
$category=$_POST['category'];
echo $category;
$author=$_POST['author'];
$titre=$_POST['titre'];
$text=$_POST['contenue'];


$req=$database->prepare("UPDATE `post` SET `Title`=?,`Contents`=?,`Author_Id`=?,`Category_Id`=? WHERE  post.Id=?");
$req->execute([$titre,$text,$author,$category,$id]);



header('Location:modifier.php?id='.$id);
exit();
?>