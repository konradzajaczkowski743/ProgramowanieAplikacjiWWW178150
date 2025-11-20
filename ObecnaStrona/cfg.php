<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $baza = 'moja_strona';

    $login = 'admin';
    $pass = 'admin123';

    $link = mysqli_connect($dbhost, $dbuser, $dbpass);
    if(!$link) echo '<b>przerwane połączenie</b>';
    if(!mysqli_select_db($link,$baza)) echo '<b>nie wybrano bazy</b>';
?>

