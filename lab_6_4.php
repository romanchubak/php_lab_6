<?php
include "readFromDb.php";
include_once "../configs/config_for_lab6.php";
$data = array();
if(isset($_POST["button_for_lab4"])) {
    $myString = $_POST["string_for_lab4"];
    $mysqli = new mysqli($link,$username,$password,$dbname);
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
                        array("subject.IdLector" => "lector.IdLector")),
                      "WHERE" => array("Name"),
                      "LIKE" => "'%".$myString."%'"
                      )
                );
}
?>
