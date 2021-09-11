
function validateTransForm(){

    let solde = document.forms["trans"]["solde"].value;
    let montant = document.forms["trans"]["montant"].value;
    let typeTrans = document.forms["trans"]["typeTrans"].value;
    
    if (isNaN(montant) || montant <= 0){
        alert("le montant saisie n'est pas valide");
        return false;
    }
    montant = parseInt(montant);
    
    if (typeTrans === "retrait"){
        if (solde < montant ){
            alert ("le solde de ce compte ne permet pas de faire un tel retrait");
            return false;
        }
        return true;
    }
    
}