<?php

try{
  $conix=new PDO("mysql:host=localhost;dbname=gestionstagiaire_v1;port=3306","root","");
}
catch ( Exception $e ){
      echo "il y a une erreur :".$e;
}

?>