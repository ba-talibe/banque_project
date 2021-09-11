function validateAddForm()
{
    let num = document.forms["form"]["numCompte"].value;
    let code1 = document.forms["form"]["code1"].value;
    let code2 = document.forms["form"]["code2"].value;
    if (code1 != code2) {
        alert("Les codes entres sont differents");
        return false;
    }

   if (code1.length != 4 ){
        alert("Le code saisie est invalide \nVeiller saisir un code à 4 chiffre");
        return false;
   }
   validateNumCompte();
}



function validateNumCompte(){
    if (num.length > 6){
        alert("Veiller saisir un nombre inferieur ou egal  à 6 chiffre");
        return false;
   }
}

