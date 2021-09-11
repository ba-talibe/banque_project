function getNumCompt(elm){
    let numCompteId = "compte" + elm.id;
    let ligneId = "ligne" + elm.id;
    let numCompte = document.getElementById(numCompteId);
    let form = document.forms["delete"];
    let ligne = document.getElementById(ligneId);
    ligne.parentNode.removeChild(ligne);
    form["numCompte"].value = numCompte.innerText;
    form.submit();

}