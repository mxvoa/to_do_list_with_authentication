<?php
    session_start();
    session_unset();
    unset($_COOKIE['hash']);
    setcookie("hash", "", time()-3600);
    header('Location: logowanie.php');
