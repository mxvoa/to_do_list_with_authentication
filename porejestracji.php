<?php
    session_start();
     
    if (!isset($_SESSION['udanarejestracja']))
    {
        header('Location: logowanie.php');
        exit();
    }
    else
    {
        unset($_SESSION['udanarejestracja']);
    }
     
    if (isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
    if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
    if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
    if (isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);

    if (isset($_SESSION['e_login'])) unset($_SESSION['e_login']);
    if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if (isset($_SESSION['e_haslo2'])) unset($_SESSION['e_haslo2']);
     
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukces!</title>
    <link rel="stylesheet" href="stylerejestracja.css">

<body>
<div class="powitanie">
<h1> Teraz możesz się zalogować :)</h1>

</body>
</html>
