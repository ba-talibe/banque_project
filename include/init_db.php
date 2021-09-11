<?php
    include "database.php";
    if(!$result = $db->query("CREATE TABLE IF NOT EXISTS Clients(idclient integer auto_increment,
                                prenom varchar(100),
                                nom varchar(50),
                                numCompte varchar(15),
                                solde int,
                                code varchar(4),
                                primary key(idclient, numCompte)
                                );"))
    {
        echo "<script> alert('Impossile d'initiliser la table des Clients');</script>";
        die();
    }
    if(!$result = $db->query("CREATE TABLE IF NOT EXISTS Transactions(idclient int references Clients(idclient),
                                typeTrans enum('DPT', 'RTR'),
                                numCompte varchar(15) references Clients(numCompte),
                                montant int,
                                dateTrans datetime,
                                primary key(dateTrans, numCompte)
                                );"))
    {
        echo "<script> alert'Impossile d'initiliser la table des Transactions');</script>";
        die();
    }
?>
