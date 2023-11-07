<?php
include "baza.php";
$ID = $_GET["ID"];
$sql = "DELETE FROM kalendarz WHERE ID = $ID";
$db = new mysqli('localhost', 'root', '', 'projekt');

        if ($db->connect_error) {
            die("Błąd połączenia z bazą danych: " . $db->connect_error);
        }
        $result = $db->query($sql);
if ($result) {
  header("Location: kalendarz.php?msg=Zadanie usunięte.");
} else {
  echo "Failed: " . mysqli_error($conn);
}
?>
