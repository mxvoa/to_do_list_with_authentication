<?php
session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: logowanie.php');
    exit();
}
?>

<?php
include "baza.php";

if (isset($_POST["submit"])) {
    $data_dodania = $_POST['data_dodania'];
    $data_rozpoczecia = $_POST['data_rozpoczecia'];
    $data_zakonczenia = $_POST['data_zakonczenia'];
    $czy_zakonczono = $_POST['czy_zakonczono'];
    $opis_zadania = $_POST['opis_zadania'];

    $db = new mysqli('localhost', 'root', '', 'projekt');

    if ($db->connect_error) {
      die("Błąd połączenia z bazą danych: " . $db->connect_error);
  }

    $sql = "INSERT INTO `kalendarz`(`ID`, `data_dodania`, `data_rozpoczecia`, `data_zakonczenia`, `czy_zakonczono`, `opis_zadania`) VALUES (NULL,'$data_dodania', '$data_rozpoczecia', NULL, '$czy_zakonczono', '$opis_zadania')";

    $result = $db->query($sql);

    if ($result) {
      header("Location: kalendarz.php?msg=Zadanie zostało dodane.");
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
    <title>Dodawanie zadania</title>
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="tabela.css">
</head>

<body>
    <ul id="top-menu">
        <li><a href="pologowaniu.php" >Strona główna</a></li>
        <li><a href="kalendarz.php">Kalendarz</a></li>
        <li><a href="wylogowanie.php">Wyloguj</a></li>
    </ul>


    <div id="dodawanie_zadania">
        <h1>DODAWANIE NOWEGO ZADANIA</h1>

        <div class="dodawanie_nowego_zadania">
            <form method="post">
                <label class="form-label">Data dodania zadania: </label><br />
                <input type="datetime-local" class="form-control" name="data_dodania" placeholder="Data i godzina"><br />

                <br /><label class="form-label">Planowana data rozpoczęcia: </label><br />
                <input type="datetime-local" class="form-control" name="data_rozpoczecia" placeholder="Data i godzina"><br />

                <br /><label class="form-label">Opis zadania: </label><br />
                <textarea class="form-control" name="opis_zadania" placeholder="Wpisz opis..." rows="4"></textarea>

                <br /><div class="button-container">
                  <button type="submit" name="submit">Zapisz</button></div>
                <a href="kalendarz.php"><input type="button" value="Anuluj"></a>
            </form>
        </div>
    </div>
</body>
</html>