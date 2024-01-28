<?php

require("connexion.php");
$select = $conix->prepare("SELECT * FROM compteadministrateur where loginAdmin=? and motPasse=?");
$select->execute([$_POST['login'], $_POST['motpass']]);

if (empty($_POST['login']) || empty($_POST['motpass'])) {
  header("location:authentifier.php?msg=les données d'authentification sont obligatoires");
} elseif ($select->rowCount() < 1) {
  header("location:authentifier.php?msg=les données d'authentification sont  incorrects");

} else {
  session_start();
  $_SESSION['login'] = $_POST['login'];
  $_SESSION['motpass'] = $_POST['motpass'];
  header("location:acceuil.php");

}


?>