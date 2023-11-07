<?php
session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: logowanie.php');
    exit();
}
?>

<?php
include "baza.php";
$ID = $_GET["ID"];

if (isset($_POST["submit"])) {
  $data_rozpoczecia = $_POST['data_rozpoczecia'];
  $data_zakonczenia = $_POST['data_zakonczenia'];
  $czy_zakonczono = $_POST['czy_zakonczono'] ? 1 : 0;
  $opis_zadania = $_POST['opis_zadania'];

  $db = new mysqli('localhost', 'root', '', 'projekt');

  if ($db->connect_error) {
      die("Błąd połączenia z bazą danych: " . $db->connect_error);
  }

  $sql = "UPDATE kalendarz SET `data_rozpoczecia`='$data_rozpoczecia', `data_zakonczenia`='$data_zakonczenia', `czy_zakonczono`='$czy_zakonczono', `opis_zadania`='$opis_zadania' WHERE ID = $ID";

  $result = $db->query($sql);

  if ($result) {
    header("Location: kalendarz.php?msg=Informacje zostały zmienione.");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja zadania</title>
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="tabela.css">
</head>

<body>
    <ul id="top-menu">
        <li><a href="pologowaniu.php" >Strona główna</a></li>
        <li><a href="kalendarz.php">Kalendarz</a></li>
        <li><a href="wylogowanie.php">Wyloguj</a></li>
    </ul>

    <?php
        $db = new mysqli('localhost', 'root', '', 'projekt');

        if ($db->connect_error) {
            die("Błąd połączenia z bazą danych: " . $db->connect_error);
        }

        $sql = "SELECT * FROM kalendarz";

        $result = $db->query($sql);
        
        $row = $result->fetch_assoc();
        
            ?>
<div class="form-container">
    <form method="post">
        <div class="col">
            <br /><label class="form-label">Nowa data rozpoczęcia: </label>
            <input type="datetime-local" class="form-control" name="data_rozpoczecia" value="<?php echo $row['data_rozpoczecia'] ?>">
        </div>

        <div class="col">
            <br /><label class="form-label">Data zakończenia: </label>
            <input type="datetime-local" class="form-control" name="data_zakonczenia" value="<?php echo $row['data_zakonczenia'] ?>">
        </div>

        <div class="col">
            <br /><label class="form-label">Czy zadanie zakończone?: </label>
            <input type="checkbox" class="form-control" name="czy_zakonczono" <?php echo $row['czy_zakonczono'] ? "checked" : "" ;?>>
        </div>

        <div class="col">
            <br /><label class="form-label">Edytuj opis zadania: </label>
            <textarea class="form-control" name="opis_zadania"><?php echo $row['opis_zadania'] ?></textarea>
        </div>

        <div>
            <br /><button type="submit" name="submit">Zaktualizuj informacje</button>
            <a href="kalendarz.php"><input type="button" value="Anuluj"></a>
        </div>
    </form>
</div>
    </div>

</div>
</div>
</body>
</html>