<?php

require("connexion.php");
if(isset($_POST['sub'])){
$type=$_FILES['photo']['type'];
$location="";

if(strpos($type,"image/")===0){
$namefoto=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];
$location="images_V1/".$namefoto;
move_uploaded_file($tmp,$location);
}
$ajout=$conix->prepare("INSERT INTO stagiaire(nom,prenom,dateNaissance,photoProfil,idFiliere) VALUES (?,?,?,?,?)");
$ajout->execute([$_POST['nom'],$_POST['prenom'],$_POST['date'],$location,$_POST['filiere']]);


header("location:acceuil.php");
}


?>