<!--<head>
        <script type="text/javascript" src="../JS/transForms.js"></script>
</head>
-->
<div>
    <form name="trans" 
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
            onsubmit="return validateTransForm()"
            method="POST" >
            <label>
                Prenom et Nom
            </label>
            <input class="input" value="<?php echo $info['prenom'] . " " . $info['nom']; ?>"
                 type="text" readonly >
            <label>
                Solde du Compte
            </label>
            <input class="input" value="<?php echo $info['solde']; ?>"
                 type="text" 
                 name="solde"
                 readonly >
            <label>
                Type de transfert
            </label>

            <div>
                <!--<input type="radio" id="retrait" name="typeTrans" valie="retrait">
                <label for="retrait" > Retrait </label>
                <input type="radio" id="depot" name="typeTrans" value="depot">
                <label for="depot" > Depot </label></br>-->
                <select name="typeTrans">
                    <option value="retrait">Retrait </option>
                    <option value="depot"> Dépot </option>
                </select>
            </div>
            <input type="text" value="<?php echo $numCompte; ?>" readonly  name="numCompte" />
            <label>
                Montant
            </label>
            <input class="input" type="text" placehoder="10000" autocomplete="off" name="montant">
            <input class="input" name="send" type="submit" value="Valider" />
    </form>
</div>

