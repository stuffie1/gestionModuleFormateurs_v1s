<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['motpass'])){
  header("location:acceuil.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">

</head>
<body>
  <nav class="nav nav-bar py-4 bg-dark">
     <h1 class="text-light m-auto">authentification</h1>
  </nav>
  <div class="w-50 my-5 mx-auto px-5">

 <form action="authentifierAction.php " method="POST" autocomplete="off" class="my-5">
    <label class="form-label h5 mb-3">login </label> <br>
    <input type="text" name="login" class="input-group  mb-3"><br>
    <label class="form-label h5 mb-3">password </label> <br>
    <input type="text" name="motpass" class="input-group  mb-3"><br>
    <input type="submit" name="" id="" class='btn btn-warning fw-bolder w-100'>
  </form>
  
  <?php
     if(isset($_GET['msg'])){

       ?>
       <h3 style="color:red" class="alert h5 alert-danger"><?php echo $_GET['msg']; ?></h3>
     <?php } ?>
     </div>
</body>
</html>