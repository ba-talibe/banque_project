<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenue</title>
        <link rel="stylesheet" type="text/css" href="CSS/common.css" />
        <link rel="stylesheet" type="text/css" href="CSS/formstyle.css" />
        <link rel="stylesheet" type="text/css" href="CSS/nav.css" >
        <script type="text/javascript" src="./JS/transForm.js"></script>
    </head>
    <body>
        <?php
            include "include/database.php";

        ?>
        <div class="maindiv">
            <div class="nav">
                    <?php include "include/nav_bar.php" ?>
            </div>
            <div class="content">
                <h1>Transactions</h1>

                <form name="search"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                    onsubmit="return validateAddForm()" method="POST" >

                    <label>
                        Numéro de compte
                    </label>
                    <input class="input" autocomplete="off" name ="numCompte" type="text" placeholder="Numéro de compte" required/>

                    <input name="searchCompte" type="submit" value="chercher" autocomplete="off" />
                </form>
            </div>
          <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $numCompte = "N" . $_POST["numCompte"];
                global $numCompte;
            }

            if (isset($_POST['searchCompte'])){
            $info = fetch_info($numCompte, $db);
            if (count($info) > 1){
                include("include/transTemplate.php");
            }else{
                echo '<script> alert ("Impossible de trouver le compte demander");</script>';
            }
        }
        if(isset($_POST['send'])){

                $montant = (int)$_POST["montant"];
                $solde = (int)$_POST["solde"];
                $numCompte = $_POST["numCompte"];
                $typeTrans = $_POST["typeTrans"];
                $typeTrans = getEnumFormat($typeTrans);

            if ($montant == 0){
                echo '<script> alert ("Saisie invalide");</script>';
            }
            echo "<script> alert ('checkpoint numero 1  atteint');</script>";
            if (!(validateAmount($montant, $solde, $typeTrans))){
                echo "<script> alert ('Transaction Impossible');</script>";
                die();
            }
            echo "<script> alert ('checkpoint numero 2  atteint');</script>";
            if($typeTrans == getEnumFormat("DPT")){
                $solde += $montant;
            }else{
                $solde -= $montant;
            }
            echo "<script> alert ('checkpoint numero 3  atteint');</script>";

            if(!$stmtT = $db->prepare("insert into Transactions(idclient, typeTrans, numCompte, dateTrans, montant) VALUES((select idclient from Clients where numCompte=?),
            ?, ?, NOW(), ?);")){
                echo "<script> alert ('Impossible de preparer la requete :\nL'enregistrement de la transaction a echouer');</script>";
                die();
            }

            if (!$stmtT->bind_param("sssi", $numCompte, getEnumFormat($typeTrans), $numCompte, $montant)){
                echo "<script> alert ('Impossible de lier les donnees :\nL'enregistrement de la transaction a echouer');</script>";
                die();
            }
            if(!$stmtT->execute()){
                echo "<script> alert ('Impossble d'executer la requete : \nL'enregistrement de la transaction a echouer');</script>";
                die();
            }


            echo "<script> alert (' historique Transaction reussi : ');</script>";


            if(!$stmt = $db->prepare("update Clients set solde=? where numCompte=?;")){
                echo "<script> alert ('Impossible de preparer la requete :');</script>";
                die();
            }

            if (!$stmt->bind_param("is", $solde, $numCompte)){
                echo "<script> alert ('Impossible de lier les donnees :');</script>";
                die();
            }
            if(!$stmt->execute()){
                echo "<script> alert ('Impossble d'executer la requete : ');</script>";
                die();
            }
            $stmt->close();
            $stmtT->close();
            echo "<script> alert ('Transaction reussi : ');</script>";
        }
          ?>

        </div>
    </body>
</html>
