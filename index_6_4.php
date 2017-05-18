<?php include "lab_6_4.php";
      include "DoTable.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>lab 6_4</title>
        <meta charset="utf-8">
    </head>
    <body>
        <table border="1" cellspacing="0" width="100%">
            <tr>
                <td align="center" width="17%">
                    <form method="post">
                        <label for="string_for_lab4">Введіть символи</label><br>
                        <input name="string_for_lab4" type="text"><br>
                        <input name="button_for_lab4" type="submit" value="тиць">
                    </form>
                </td>
                <td align="center">
                  <?php echo doTable(array("Id","Ім'я предмету",
                                          "Номер семестру",
                                          "Кількість годин",
                                          "Форма Контролю",
                                          "Ім'я лектора",
                                          "Прізвище лектора")
                          ,$data) ?>

            </tr>
        </table>
        <a href="index_6_2.php">lab 6_2</a><br>
        <a href="index_6_3.php">lab 6_3</a><br>
    </body>
</html>
