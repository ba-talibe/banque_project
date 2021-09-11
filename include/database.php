<?php
    $db = new mysqli("localhost", "phpadmin", "phpadmin", "banque");
    if ($db->connect_errno) {
        echo "Échec lors de la connexion à MySQL : (" . $db->connect_errno . ") " . $db->connect_error;
    }
    $str = "hello world";
    global $str;
    global $db;

?>