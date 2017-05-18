<?php
  function readFromDb($mysqli,$isDistinct,$whatselected,$from,$where = null)
  {
        // from = "string"
        // where = {
        //{ "where" => {"","",""}
        //  "like" => ""
        //  left join = ""
        //  "oreder By" => {"",""}


        $data = array();
        $sql = "SELECT ";
        if($isDistinct) $sql .= "DISTINCT ";
        for( $i = 0 ; $i<count($whatselected)-1; $i++) {
          $sql .= $whatselected[$i] . ", ";
        }
        $sql .= $whatselected[count($whatselected)-1]." ";
        $sql .= "FROM " . $from . " ";
        if( $where != null)
        foreach ($where as $key => $value) {
            if($value != null)
            {
                $sql .= $key . " ";
                if(is_array($value))
                {
                    foreach ($value as $val) {
                      $sql .= $val . " ";
                    }
                }
                else $sql .= $value . " ";
            }
        }
        //echo $sql;
        $result = $mysqli->query($sql);
        $data = $result->fetch_all();
        return $data;
  }
  function Left_Join($table, $matching)
  {
      $join = $table ." ON ";
      foreach ($matching as $key => $value) {
          $join .= $key ."=". $value;
      }
      return $join;
  }

  /*
  SELECT subject.id, subject.Name, subject.NumberOfSemestr, subject.CountOfHours,
          formcontrol.NameFormControl, lector.FirstName, lector.SecondName
          FROM subject
          LEFT JOIN formcontrol ON subject.IdFormControl=formcontrol.IdFormControl
          LEFT JOIN lector on subject.IdLector=lector.IdLector
  */
?>
