<?php
    
    session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['motpass'])){
  header("location:authentifier.php");
}
require("connexion.php");

    $r=$conix->prepare("DELETE FROM stagiaire where idstagiaire=?");
    $r->execute(array($_GET['idstagiaire']));
    header("location:acceuil.php");


    

?>  