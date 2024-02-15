"use strict"

function envoi_formulaire() {
  // Récupération des éléments du formulaire
  let form = document.getElementById("form-contact");
  let submitMessage = document.getElementById("submitMessage");

  submitMessage.style.display = "block";
  document.getElementById('validWithScript').click();
  form.reset();
}



//----------------------------------------------------
let button_valid = document.getElementById("validWithScript");
let burger = document.querySelector("#nav-burger");

burger.addEventListener("click", () => {
  console.log("ok");
  document.getElementById("nav-burger-activated").classList.remove("burger-not-active")
  document.getElementById("nav-container-links-activated").classList.remove("burger-not-active")
  document.getElementById("nav-links-burger-activated").classList.remove("burger-not-active")

});

document.getElementById("nav-burger-activated").addEventListener("click", () => {
  document.getElementById("nav-burger-activated").classList.add("burger-not-active")
})


const scrollers = document.querySelectorAll(".scroller");

if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
  addAnimation();
}

function addAnimation() {
  var windowWidth = window.innerWidth;

  // Vérifier si la largeur de l'écran est supérieure ou égale à 800 pixels
  if (windowWidth >= 800) {
    scrollers.forEach((scroller) => {
      scroller.setAttribute("data-animated", true);

      const scrollerInner = scroller.querySelector(".scroller__inner");
      const scrollerContent = Array.from(scrollerInner.children);

      scrollerContent.forEach((item) => {
        const duplicatedItem = item.cloneNode(true);
        duplicatedItem.setAttribute("aria-hidden", true);
        scrollerInner.appendChild(duplicatedItem);
      });
    });
  }
}


//---------------------btn cv---------------------

let btnApparitionCv = document.getElementById("btn-voir-cv");
let containerCV = document.getElementById("apparition-CV");
let cross = document.getElementById("cross-cv");
let cv = document.getElementById("section-cv-apparition");

btnApparitionCv.addEventListener("click", () => {
    cv.style.display = "block";
})

cross.addEventListener("click", () => {
    let cv = document.getElementById("section-cv-apparition");
    cv.style.display = "none";
})

containerCV.addEventListener("click", () => {
    let cv = document.getElementById("section-cv-apparition");
    cv.style.display = "none";
})