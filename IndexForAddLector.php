<?php include  "AddLector.php"; ?>
<?php include "DoTable.php";?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lectores</title>
        <meta charset="utf-8">
    </head>
    <body>
        <table>
            <tr>
                <td width="15%">
                  <form method="post" >
                      <label for="FirstName">Ім'я Лектора</label><br>
                      <input type="text" name="FirstName"><br>
                      <label for="SecondName">Прізвище Лектора</label><br>
                      <input type="text" name="SecondName"><br>
                      <label for="Birthday">Дата народження</label><br>
                      <input type="date" name="Birthday"><br>
                      <input type="submit" name="AddLector" value="Додати" ><br>
                      <a href="index_6_2.php">lab 6_2</a><br>
                  </form>
                </td>
                <td width="85%">
                <?php
                 echo doTable(array("Id","Ім'я Лектора",
                                        "Прізвище Лектора",
                                        "Дата народження",
                                        )
                        ,$data) ?>
                </td>
            </tr>
        </table>
    </body>
</html>
