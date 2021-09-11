<?php 
    require_once "include/init_db.php";
    include "include/core.php"
?>
<html>
    <head>
        <title>Bienvenue</title>
        <link rel="stylesheet" type="text/css" href="CSS/common.css" />

    </head>
    <body>
        <div class="maindiv">
            <div class="action">
                <?php insertImg("add.png", "margin-right: 20%;") ?><a id="add"  href="add.php">Creation</a>
            </div>
            <br/>
            <div class="action" >
                <?php insertImg("delete.png", "margin-right: 20%;") ?><a id="remove" href="supprimer.php">Suppression</a>
            </div><br/>
            <div class="action">
                <?php insertImg("trans.png", "margin-right: 20%;") ?><a id="trans" href="trans.php">Transactions</a><br/>
            </div><br/>
        </div>
    </body>
</html>
