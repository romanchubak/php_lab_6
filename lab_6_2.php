<?php
  include 'readFromDb.php';
  include 'makeSelect.php';
  include_once "../configs/config_for_lab6.php";

  $mysqli = new mysqli($link,$username,$password,$dbname);
  $data=array();
  $selectForFormControl = makeSelect("FormOfControl","Форма контролю",
                                readFromDb($mysqli,false,array("*"),
                                "formcontrol")
                                  );
  $selectForLectors = makeSelect("Lector","Лектор",
                                  readFromDb($mysqli,false,array("IdLector","FirstName","SecondName"),
                                  "lector"),true
                                );
  if(isset($_POST["Add"])){
      $NameOfSubject=$_POST["NameOfSubject"];
      $NumberOfTerm = $_POST["NumberOfTerm"];
      $CountOfHours = $_POST["CountOfHours"];
      $FormOfControl = $_POST["FormOfControl"];
      $Lector = $_POST["Lector"];
      if($Lector === "addnew"){
        header('Location: IndexForAddLector.php');
        exit();
      }
      if($NameOfSubject!="" && ctype_alpha($NameOfSubject)&&
      $NumberOfTerm !="" && is_numeric($NumberOfTerm)&&
      $CountOfHours !="" && is_numeric($CountOfHours)) {
        $mysqli->query("INSERT INTO subject ( Name, NumberOfSemestr,
        CountOfHours, IdFormControl, IdLector)".
         " VALUES ('".$NameOfSubject."', ".
                    "'".$NumberOfTerm."', ".
                    "'".$CountOfHours."', ".
                    "'".$FormOfControl."', ".
                    "'".$Lector."')");
                    $data = readFromDb($mysqli,
                    false,array("subject.id",
                                "subject.Name",
                                "subject.NumberOfSemestr",
                                "subject.CountOfHours",
                                "formcontrol.NameFormControl",
                                "lector.FirstName",
                                "lector.SecondName"),"subject",
                                array("LEFT JOIN" => Left_Join("formcontrol",
                                        array("subject.IdFormControl" => "formcontrol.IdFormControl")),
                                      "LEFT JOIN " => Left_Join("lector",
                                        array("subject.IdLector" => "lector.IdLector"))
                                      )
                                );
      }
  }
  /*
  SELECT subject.id, subject.Name, subject.NumberOfSemestr, subject.CountOfHours,
          formcontrol.NameFormControl, lector.FirstName, lector.SecondName
          FROM subject
          LEFT JOIN formcontrol ON subject.IdFormControl=formcontrol.IdFormControl
          LEFT JOIN lector on subject.IdLector=lector.IdLector
  */
  else $data = readFromDb($mysqli,
  false,array("subject.id",
              "subject.Name",
              "subject.NumberOfSemestr",
              "subject.CountOfHours",
              "formcontrol.NameFormControl",
              "lector.FirstName",
              "lector.SecondName"),"subject",
              array("LEFT JOIN" => Left_Join("formcontrol",
                      array("subject.IdFormControl" => "formcontrol.IdFormControl")),
                    "LEFT JOIN " => Left_Join("lector",
                      array("subject.IdLector" => "lector.IdLector"))
                    )
              );
  $mysqli->close();
 ?>
