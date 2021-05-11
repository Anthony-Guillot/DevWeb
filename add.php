<?php
try{
    $base = new PDO('mysql:host=localhost;dbname=users','guillot','010828');
}
catch(PDOException $e){
    echo $e->getMessage();
}
$mail = $_GET['mail']; // get id through query string

$modi=$base->query("update user set ad=1 where mail = '$mail'");

header("location:http://localhost/DevWeb/compte.php");
exit;	
?>