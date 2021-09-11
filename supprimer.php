<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenue</title>
        <link rel="stylesheet" type="text/css" href="CSS/common.css" />
        <link rel="stylesheet" type="text/css" href="CSS/deleteStyle.css" />
        <link rel="stylesheet" type="text/css" href="CSS/nav.css" />
        <script type="text/javascript" src="JS/deleteClient.js"></script>
    </head>
    <body>
        <?php
            require "include/database.php";
        ?>
        <div class="maindiv">
            <div class="nav">
                    <?php include "include/nav_bar.php" ?>
            </div>

            <div class="content">
                <h1>Suppression</h1>
                    <?php include("include/deleteTemplate.php"); ?>
                <form name="delete" 
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
                    method="POST" >
                    <input name="numCompte" type="hidden" value="" >
                </form>
            </div>
    </div>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $numCompte = $_POST["numCompte"];
            echo '<script> alert ("' .$numCompte . '");</script>';
        }

        if (isset($_POST['numCompte']))
        {
            if (!$stmt = $db->prepare("DELETE FROM Clients where numCompte=?"))
            {
                echo "<script> alert ('Impossible de preparer la requete :\n');</script>";
                die();
            }

           if(!$stmt->bind_param("s", $numCompte))
           {
               echo '<script> alert ("Impossible de lier les donner");</script>';
               die();

           }
           if(!$stmt->execute())
           {
                echo '<script> alert ("Impossble d\'executer la requete");</script>';
                echo "<script> alert (" . $mysqli->errno . ");</script>";
                die();
            }
            header("Refresh:0");
        }
    ?>

    </body>
</html>
