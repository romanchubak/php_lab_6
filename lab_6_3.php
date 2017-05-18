<?php
  include "readFromDb.php";
  include_once "../configs/config_for_lab6.php";
  $data = array();
  $lecturers = array();
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
                    "ORDER BY" => array("subject.NumberOfSemestr")
                    )
              );
  $lecturers = readFromDb($mysqli,
                          true,
                          array("lector.FirstName", "lector.SecondName"),
                          "subject",
                          array(
                            "LEFT JOIN " => Left_Join("lector",
                              array("subject.IdLector" => "lector.IdLector"))
                          )
                          );
  $lecturers[] = count($lecturers);
  $mysqli->close();
?>
