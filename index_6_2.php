<?php include  "lab_6_2.php"; ?>
<?php include "DoTable.php";?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6_2</title>
        <meta charset="utf-8">
    </head>
    <body>
        <table>
            <tr>
                <td width="15%">
                  <form method="post" >
                      <label for="NameOfSubject">Ім'я предмету</label><br>
                      <input type="text" name="NameOfSubject"><br>
                      <label for="NumberOfTerm">Номер семестру</label><br>
                      <input type="text" name="NumberOfTerm"><br>
                      <label for="CountOfHours">Кількість годин</label><br>
                      <input type="text" name="CountOfHours"><br>
                      <?php echo $selectForFormControl; ?>
                      <?php echo $selectForLectors; ?>
                      <input type="submit" name="Add" value="Додати" ><br>
                      <a href="index_6_3.php">lab 6_3</a><br>
                      <a href="index_6_4.php">lab 6_4</a><br>
                  </form>
                </td>
                <td width="85%">
                <?php
                 echo doTable(array("Id","Ім'я предмету",
                                        "Номер семестру",
                                        "Кількість годин",
                                        "Форма Контролю",
                                        "Ім'я лектора",
                                        "Прізвище лектора")
                        ,$data) ?>
                </td>
            </tr>
        </table>
    </body>
</html>
