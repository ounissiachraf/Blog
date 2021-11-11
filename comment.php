<?php



try{
    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$database->query("SET lc_time_names = 'fr_FR'");

$pseudo=$_POST['pseudo'];
$comment=$_POST['comment'];
$id=$_POST['post_id'];

echo htmlspecialchars($comment);
echo htmlspecialchars($pseudo);
$req=$database->prepare("INSERT INTO `comment`(`NickName`, `Contents`, `CreationTimestamp`, `Post_Id`) VALUES (?,?,Now(),?)");
$req->execute([$pseudo,$comment,$id]);
header('Location:post.php?post_id='.$id."#comment")
?>