<html>
    <head>
        <title>Bienvenue</title>
        <link rel="stylesheet" type="text/css" href="CSS/common.css" />
        <link rel="stylesheet" type="text/css" href="CSS/formstyle.css" />
        <link rel="stylesheet" type="text/css" href="CSS/nav.css" >
        <script type="text/javascript" src="JS/addForm.js"></script>
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
                <h1>Ajouter un compte</h1>
                <form name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateAddForm()" method="POST" >
                    <label>
                        Prenom
                    </label>
                    <input class="input" autocomplete="off" name ="prenom" type="text" placeholder="Prenom" required/>

                    <label>
                        Nom
                    </label>
                    <input class="input" autocomplete="off" name ="nom" type="text" placeholder="Nom" required/>

                    <label>
                        Numéro de compte
                    </label>
                    <input class="input" autocomplete="off" name ="numCompte" type="text" placeholder="Numéro de compte" required/>

                    <label>
                        Solde initial
                    </label>
                    <input class="input" autocomplete="off" name ="solde" type="text" placeholder="10000" />

                    <label>
                        Code secret
                    </label>
                    <input class="input" name ="code1" type="text" placeholder="####"  autocomplete="off" />
                    <input class="input" name ="code2" type="text" placeholder="confirmer le code secret" autocomplete="off"  />
                    <input name="send" type="submit" value="Ajouter" autocomplete="off" />
                </form>
            </div>
        </div>



        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $prenom = $_POST["prenom"];
                $nom = $_POST["nom"];
                $numCompte = "N" . $_POST["numCompte"];
                $solde = $_POST["solde"];
                $code = $_POST["code1"];
              }



              if (isset($_POST['send'])){
                /*$requete = "INSERT INTO Clients(prenom, nom, numCompte, Solde, code)
                VALUES(?, ?, ?, ?, ?)";*/
                //:prenom, :nom, :numCompte, :solde, :code
                if (!$stmt = $db->prepare(
                    "INSERT INTO Clients (prenom, nom, numCompte, solde, code)
                VALUES (?, ?, ?, ?, ?)"
                )){
                    echo "<script> alert ('Impossible de preparer la requete :\n');</script>";
                    die();
                }

               if(!$stmt->bind_param("sssii", $prenom, $nom, $numCompte, $solde, $code)){
                   echo '<script> alert ("Impossible de lier les donner");</script>';
                   die();

               }
               if(!$stmt->execute()){
                echo '<script> alert ("Impossble d\'executer la requete");</script>';
                echo "<script> alert (" . $mysqli->errno . ");</script>";
                die();
               }
               echo '<script> alert ("Client ajoute");</script>';
               $stmt->close();
              }




        ?>


    </body>
</html>
