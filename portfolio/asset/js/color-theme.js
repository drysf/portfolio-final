"use strict"

let btnColor = document.getElementById("button-change-color");
let accueilColor = document.getElementById("accueil");
let colorSvg = document.getElementById("colorSvg-change")
let sectionProjet = document.getElementById("projets")

////////////// fin de la déclaration des variables ///////

let compteur = 0;

btnColor.addEventListener("click", () => {
    if(compteur%2 == 0){
        accueilColor.style.backgroundColor = "#15283c";
        colorSvg.style.fill = "#15283c";
    }
    else{
        accueilColor.style.backgroundColor = "black";
        colorSvg.style.fill = "black";
    }
    compteur++;
});