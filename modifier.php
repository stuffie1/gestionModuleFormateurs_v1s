<?php
session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['motpass'])){
  header("location:authentifier.php");
}
require("connexion.php");
$sel=$conix->prepare("SELECT * FROM stagiaire where idstagiaire=?");
$sel->execute([$_GET["idstagiaire"]]);
$donne=$sel->fetch(PDO::FETCH_OBJ);
$select=$conix->prepare("SELECT * FROM filiere");
$select->execute();

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
    a{
      text-decoration: none;
      width:100px;
      color: green;
      
      font-weight: bolder;
      display: flex;
      flex-wrap: nowrap;
      justify-content: space-evenly;
    }
  </style>
</head>
<body>
<nav class="nav nav-bar py-4 bg-dark">
     <h1 class="text-light m-auto">Administration</h1>
  </nav>
<div class="w-50 my-5 mx-auto py-3 px-5 bg-light">
  <a href="acceuil.php" class="my-5 "><img src="images_V1/back.png" height='20px' width='20px' >Retour</a>
  <h1 class=" mb-4 text-black ">Modifier un stagiaire</h1>
  <h4 class="text-dark mb-4">veuilley remplir tous les champs </h4>
  <form action="modifierAction.php" method="POST" enctype="multipart/form-data" autocomplete="off">
       <input type="hidden" name="idstagiaire" value="<?php echo $_GET['idstagiaire'] ?> " ><br>
       <label class="form-label h6">NOM </label><br>
      <input type="text" name="nom" value="<?php echo $donne->nom   ?>" class="input-group  mb-3"><br>
      <label class="form-label h6">prenom </label><br>
      <input type="text" name="prenom" value="<?php echo $donne->prenom   ?>" class="input-group  mb-3"><br>
      <label class="form-label h6">date neissance </label><br>
      <input type="date" name="date" value="<?php echo $donne->dateNaissance   ?>" class="input-group  mb-3"><br>
      <label class="form-label h6">photo </label><br>
      <input type="file" name="photo" class="input-group  mb-3"><br>
      <input type="hidden" name="p1" value="<?php echo $donne->photoProfil   ?>"><br>
      <label class="form-label h6">filiere: </label><br>
      <select name="filiere"  class="form-select w-100">
        <?php   while($ligne=$select->fetch(PDO::FETCH_OBJ)){    ?>
            <option value="<?php echo $ligne->idFiliere ;?>" <?php if ($ligne->idFiliere ==$donne->idFiliere )
                echo "selected"; ?>><?php echo $ligne->intitule ?></option>
          <?php }?>
      </select><br>
      <input type="submit" value="modifier" name="sub" class='btn btn-success fw-bolder w-100'>




  </form>
  </div>

</body>
</html>