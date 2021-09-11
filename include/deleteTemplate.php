<?php
    
    echo "<script> alert('check point1:\n');</script>";
    if(!$result = $db->query("SELECT CONCAT(prenom, ' ', nom) AS 'nomComplet', numCompte, solde FROM Clients limit 20"))
    {
        echo "<script> alert ('Impossible de creer une requete dans la base de donnes:\n');</script>";
        die();
    }
    //init table
    echo "<script> alert ('check point:\n');</script>";
    $table = "<table>";
    $table = $table . "<tr>" .
            "<th>Nom Complet</th>" .
            "<th>Numero de compte</th>" .
            "<th>solde</th>" .
            "<th></th>".
        "</tr>";
    $i = 0;
    while($row = $result->fetch_assoc()) {
       $ligne = 
            "<tr id='ligne" . $i . "' >" .
                "<td>" . $row['nomComplet'] . "</td>" . 
                "<td class='num' " . "id='compte" . $i . "' >" . $row['numCompte'] . "</td>" .
                "<td class='num' >" . $row['solde'] . "</td>" .
                "<td class='num' >" .
                "<button class='bt' " . "id='" . $i . "'" .
                "onclick='return getNumCompt(this)'><img src='CSS/img/delete.png'" .
                " /></button></td>" .
            "</tr>";
        $table = $table . $ligne;
        $i++;
    }
    $table = $table . "</table>";
    echo $table;
    //close table tag

?>