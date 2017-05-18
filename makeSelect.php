<?php
  function makeSelect($name,$label,$list, $addnew = false)
  {
      $select = "";
      $select .= '<label for="'.$name.'">'.$label.'</label><br>';
      $select .= '<select name="'.$name . '">';
      foreach ($list as $value) {
        $select .= '<option value="'.$value[0].'">';
        for($i = 1; $i < count($value); $i++)
        {
              $select .= $value[$i] . " ";
        }
        $select .= " </option> ";
      }
      if($addnew) $select .= '<option value="addnew">Додати</option>';
      $select .= "</select><br>";
      return $select;
  }
 ?>
