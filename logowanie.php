<?php
    session_start();

    if (isset($_COOKIE['hash'])) {
        $hash = $_COOKIE['hash'];
    
        require_once "baza.php";
        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno!=0)
        {
            echo "Error: ".$polaczenie->connect_errno;
        }

        $zalogowany = $polaczenie->query ("SELECT klucz_logowania FROM klienci WHERE klucz_logowania='$hash'");
        if ($zalogowany->num_rows > 0)
        {
            header('Location: pologowaniu.php');
            exit();
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $login = $_POST['login'];
        $haslo2 = $_POST['haslo2'];

        if ($login === 'login' && $haslo2 === 'haslo2') {
            
            header('Location: pologowaniu.php');
            exit();
        } else {
            $_SESSION['blad'] = 'Błędny login lub hasło.';
            header('Location: logowanie.php');
            exit();
        }
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel logowania</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logowanie">
        <h1>LOGOWANIE</h1>
        <form action="danelogowanie.php" method="post">
                    <div id="username">
                    LOGIN: <br /> <input type="text" name="login" /> <br /><br />

                    <div id="password">
                    HASŁO: <br /> <input type="password" name="haslo2" /> <br /><br /><br />

                    <input type="submit" value="ZALOGUJ"><br /><br />
                    <a href="rejestracja.php"><input type="button" value="ZAŁÓŻ KONTO"></a><br />

        </form>

        <?php
        if(isset($_SESSION['blad']))    echo $_SESSION['blad'];
        ?>
</body>
</html>