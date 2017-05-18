<?php
  include 'readFromDb.php';
  include 'makeSelect.php';
  include_once "../configs/config_for_lab6.php";

  $mysqli = new mysqli($link,$username,$password,$dbname);

  if(isset($_POST["AddLector"])){
      $FirstName=$_POST["FirstName"];
      $SecondName = $_POST["SecondName"];
      $Birthday = $_POST["Birthday"];
         if($FirstName!="" && ctype_alpha($FirstName)&&
          $SecondName !="" && ctype_alpha($SecondName)) {
             $mysqli->query("INSERT INTO lector ( FirstName,
               SecondName, BirthDay)".
             " VALUES ('".$FirstName."', ".
                        "'".$SecondName."', ".
                        "'".$Birthday."')");
             $data = readFromDb($mysqli,
             false,array("*"),"lector");
         }
  }
  else $data = readFromDb($mysqli,
  false,array("*"),"lector");
  $mysqli->close();
 ?>
