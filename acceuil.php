<?php
session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['motpass'])) {
  header("location:authentifier.php");
}
require("connexion.php");
// $sel=$conix->prepare("SELECT * FROM stagiaire");
// $sel->execute();
$select = $conix->prepare("SELECT * FROM filiere,stagiaire where filiere.idFiliere=stagiaire.idFiliere");
$select->execute();
$admin = $conix->prepare("SELECT * FROM compteadministrateur where loginAdmin=? and motPasse=?");
$admin->execute([$_SESSION['login'], $_SESSION['motpass']]);
$administrateur = $admin->fetch(PDO::FETCH_OBJ);



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <style>
    

    tr {

      text-align: center;
      margin: 15px;
    }

    span {
      color: orangered;
    }

    h1 {

      text-align: center;
    }


    td,
    th {
      padding: 15px;
      font-weight: 500;
  

    }
  </style>
</head>

<body>
<nav class="nav nav-bar py-4 bg-dark">
     <h1 class="text-light m-auto">Administration</h1>
  </nav>
  <div class="container my-5">
  <?php 
    $currentHour = date("H");
    $msg="";


    if ($currentHour >= 0 && $currentHour <= 12) {
      $msg="BONJOUR";
    }else{
      $msg="BONSOIRE";
    }
    ?>
  <h1 class="m-5"><?php echo $msg ?> <span>
      <?php echo $administrateur->nom . " " . $administrateur->prenom ?>
    </span></h1>
  <a href="ajouter.php" class="btn btn-success fw-bolder p-1 m-4 "><img src="images_V1/plus.png" height='15px' width='15px'class="me-1" >ajouter</a></td>


  <table class="m-2  w-100">
    <tr class="bg-success">
      <th>NOM</th>
      <th>PRENOM</th>
      <th>DN</th>
      <th>PHOTO</th>
      <th>FELIERE</th>
      <th>modifier</th>
      <th>supprimer</th>
    </tr>
    <?php
    while ($ligne = $select->fetch(PDO::FETCH_OBJ)) {
      ?>
      <tr>
        <td>
          <?php echo $ligne->nom ?>
        </td>
        <td>
          <?php echo $ligne->prenom ?>
        </td>
        <td>
          <?php echo $ligne->dateNaissance ?>
        </td>
        <td><img src="<?php echo $ligne->photoProfil ?>" height='50px' width='50px'></td>
        <td>
          <?php echo $ligne->intitule ?>
        </td>
        <td><a href="modifier.php?idstagiaire=<?php echo $ligne->idstagiaire ?>"><img src="images_V1/pen.png"
              height='20px' width='20px'></a></td>
        <td><a onclick="return confirm('vous etes sure?!')"
            href="supprimer.php?idstagiaire=<?php echo $ligne->idstagiaire ?>"><img src="images_V1/trash.png"
              height='20px' width='20px'></a></td>

      </tr>
    <?php } ?>
  </table>
  <div class=" row  justify-content-center col">
    <a href="deconnecter.php" class="btn btn-danger nav-link fw-bolder p-2 my-5 text-white" style="width:150px;"> se deconnecter</a>
  </div>
  </div>
</body>

</html>