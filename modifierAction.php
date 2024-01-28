<?php

require("connexion.php");
if(isset($_POST['sub'])){
$type=$_FILES['photo']['type'];
$location=$_POST['p1'];
if(!empty($_FILES['photo']['name'])){
if(strpos($type,"image/")===0){
$namefoto=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];
$location="images_V1/".$namefoto;
move_uploaded_file($tmp,$location);
}}
$modify=$conix->prepare("UPDATE stagiaire SET nom=?,prenom=?,dateNaissance=?,photoProfil=?,idFiliere=? WHERE idstagiaire=?");
$modify->execute([$_POST['nom'],$_POST['prenom'],$_POST['date'],$location,$_POST['filiere'],$_POST['idstagiaire']]);


header("location:acceuil.php");
}


?>