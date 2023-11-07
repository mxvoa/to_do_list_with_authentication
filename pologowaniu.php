<?php
session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: logowanie.php');
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="stylesheet" href="styleindex.css">

<body>
    <ul id="top-menu">
        <li><a href="pologowaniu.php" >Strona główna</a></li>
        <li><a href="kalendarz.php">Kalendarz</a></li>
        <li><a href="wylogowanie.php">Wyloguj</a></li>
    </ul>

<div class="powitanie">
    <?php
        echo "<h1>Cześć, ".$_SESSION['login'].'!</h1>';
        echo "<h2>Życzymy miłego dnia :)</h2>";
    ?>
</body>
</html>
