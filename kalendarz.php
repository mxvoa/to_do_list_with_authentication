<?php
    session_start();
    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: logowanie.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Widok kalendarza</title>
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="tabela.css">
</head>
<body>
    <ul id="top-menu">
        <li><a href="pologowaniu.php" >Strona główna</a></li>
        <li><a href="kalendarz.php">Kalendarz</a></li>
        <li><a href="wylogowanie.php">Wyloguj</a></li>
    </ul>
    <div class="tabela">
        <table border="1">
        <h1>TWÓJ KALENDARZ</h1>
        <tr>
            <th>DATA DODANIA ZADANIA</th>
            <th>DATA ROZPOCZĘCIA ZADANIA</th>
            <th>DATA ZAKOŃCZENIA ZADANIA</th>
            <th>CZY ZAKOŃCZONO ZADANIE</th>
            <th>OPIS ZADANIA DO WYKONANIA</th>
            <th>OPERACJE</th>
        </tr>

        <?php
        $db = new mysqli('localhost', 'root', '', 'projekt');

        if ($db->connect_error) {
            die("Błąd połączenia z bazą danych: " . $db->connect_error);
        }

        $sql = "SELECT * FROM kalendarz";

        $result = $db->query($sql);

        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td>
                    <?php echo $row["data_dodania"] ?>
                </td>
                <td>
                    <?php echo $row["data_rozpoczecia"] ?>
                </td>
                <td>
                    <?php echo $row["data_zakonczenia"] ?>
                </td>
                <td>
                    <?php echo $row["czy_zakonczono"] ?>
                </td>
                <td>
                    <?php echo $row["opis_zadania"] ?>
                </td>
                <td>
                    <a href="edycja_zadania.php?ID=<?php echo $row["ID"] ?>" class="edit-link">Edytuj</a>
                    <a href="usun_zadanie.php?ID=<?php echo $row["ID"] ?>" class="delete-link">Usuń</a>
                </td>
            </tr>

            <?php
        }
        ?>
    </table>
    </br><a href="dodawanie_zadania.php"><input type="button" value="DODAJ NOWE ZADANIE"></a>
</div>
</div>

    </table>
</body>
</html>