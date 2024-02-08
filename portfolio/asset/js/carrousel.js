"use strict";

let projectsPhpMysql = [
  {
    title: "Administration d'une bibliothèque en ligne",
    description: "Cette application web permet de rajouter des livres dans une base de donnée elle posséde aussi les fonctionnalités d'emprunter un livre et de le retourner tout en suivant sa trace ainsi que son propriétaire.",
    imageSrc: "asset/img/Capture-projet1.PNG",
  },
  {
      title: "Le blog",
      description: "Cette application web permet de rajouter des livres dans une base de donnée elle posséde aussi les fonctionnalités d'emprunter un livre et de le retourner tout en suivant sa trace ainsi que son propriétaire.",
      imageSrc: "asset/img/blog.PNG",
    },
    {
      title: "EVente",
      description:"EVent est un projet en cour de réalisation qui permettra à des utilisateurs de se créer un compte, de s'y connecter, de poster des annonces de vente en ligne, de communiquer avec les acheteurs pour pouvoir se rencontrer, ainsi que d'autres fonctionnalités complémentaires comme la fait de pouvoir mettre des annonces en favoris.",
      imageSrc: "",
    },

];
let projectsWordpress = [
  {
    title:"Movie Forum",
    description:  "Le Movie forum est un site Wordpress créer avec un théme et des plugins personalisés réalisés en php qui permet aux utilisateurs la création d'articles et de commenter les articles des autres utilisateurs.",
    imageSrc: "",

  },
  {
      title:"kaoz-cosmetic.fr",

      description:  "Ce site Ecommerce réalisé en wordpress permet la vente de cosmétiques avec des moyens de paiement sécurisés ainsi q'un suivi de la commande.",
      imageSrc: "asset/img/kaoz.PNG",

    },

];

let projectsPython = [
  {
      title: "La Weather-App",
      description: "ce programme python est connecté a une api openweatherapi qui permet de retourner plusieurs informations comme la températurede la ville souhaitée.",
      imageSrc: "asset/img/weather-APP.PNG",
    },
    {
      title:"bot.scraping.py",
      description:  "Le scraping bot réalisé en python a pour but de récuperer le code de n'importe quel site et de trier le code en recherchant des mots clés.",
      imageSrc: "asset/img/scraping.PNG",
    },
    {
      title: "Bloc-note",

      description:  "Ce proramme python réalisé a l'aide du module tkinter vous donne la possibilité de noter vos pensées et de les enregistrer sous un format txt puis de les ouvrir dans le même programme par la suite.",
      imageSrc: "asset/img/bloc-note.PNG",
    },
    {
      title: "SpeedTest",
      description:  "SpeedTest est un programme python permettant de calculer sa vitesse de connection",
      imageSrc: "asset/img/speedTest.PNG",

    },

    
];

let projectsHtmlCssJs = [
  {
    title: "La Todo-list",
    description:"La ToDo-List est une application web vous permettant a l'aide du localStorage d'enregistrer vos activités programmées et de les supprimer une fois réalisée.",
    imageSrc: "asset/img/todo-list.PNG",
  },
  {
      title: "La Recipe-App",
      description: "Cette application web est reliée a une api web nommée mealDB qui posséde divers noms de plats ainsi que leurs recettes, cette application vous permet de consulter les recettes de vos plats favoris.",
      imageSrc:"asset/img/recipe-App.webp",
    },
];



let imageProjet = document.getElementById("imgProject");
let descriptifProjet = document.getElementById("descriptif_project");
let titreProjet = document.getElementById("titreProjet");

let btn1v = document.getElementById("btn1");
let btn2v = document.getElementById("btn2");
let btn3v = document.getElementById("btn3");
let btn4v = document.getElementById("btn4");

btn1v.style.borderColor = "#0081FF";

let currentIndex = 0;

btn1v.addEventListener("click", btn1);
btn2v.addEventListener("click", btn2);
btn3v.addEventListener("click", btn3);
btn4v.addEventListener("click", btn4);

let currentCategory = 'php-mysql'; 

function setCategory(category) {
  currentCategory = category;
  currentIndex = 0;
  afficherProjet();
}


setCategory("php-mysql");

function afficherProjet() {
  let project;
  switch (currentCategory) {
    case 'php-mysql':
      project = projectsPhpMysql[currentIndex];
      break;
    case 'python':
      project = projectsPython[currentIndex];
      break;
    case 'wordpress':
      project = projectsWordpress[currentIndex];
      break;
    case 'html-css-js':
      project = projectsHtmlCssJs[currentIndex];
      break;
  }

  titreProjet.innerHTML = project.title;
  descriptifProjet.innerHTML = project.description;
  imageProjet.src = project.imageSrc;
}

function suivant() {
  switch (currentCategory) {
    case 'php-mysql':
      currentIndex = (currentIndex + 1) % projectsPhpMysql.length;
      break;
    case 'python':
      currentIndex = (currentIndex + 1) % projectsPython.length;
      break;
    case 'wordpress':
      currentIndex = (currentIndex + 1) % projectsWordpress.length;
      break;
    case 'html-css-js':
      currentIndex = (currentIndex + 1) % projectsHtmlCssJs.length;
      break;
  }
  updatePastilles()
  afficherProjet();
}

function precedent() {
  switch (currentCategory) {
    case 'php-mysql':
      currentIndex = (currentIndex - 1 + projectsPhpMysql.length) % projectsPhpMysql.length;
      break;
    case 'python':
      currentIndex = (currentIndex - 1 + projectsPython.length) % projectsPython.length;
      break;
    case 'wordpress':
      currentIndex = (currentIndex - 1 + projectsWordpress.length) % projectsWordpress.length;
      break;
    case 'html-css-js':
      currentIndex = (currentIndex - 1 + projectsHtmlCssJs.length) % projectsHtmlCssJs.length;
      break;
  }
  updatePastilles()
  afficherProjet();
}
function updatePastilles() {
  const pastillesContainer = document.getElementById("pastillesContainer");
  pastillesContainer.innerHTML = "";

  let projects;
  switch (currentCategory) {
    case 'php-mysql':
      projects = projectsPhpMysql;
      break;
    case 'python':
      projects = projectsPython;
      break;
    case 'wordpress':
      projects = projectsWordpress;
      break;
    case 'html-css-js':
      projects = projectsHtmlCssJs;
      break;
  }

  for (let i = 0; i < projects.length; i++) {
    const pastille = document.createElement("div");
    pastille.className = "pastille";
    pastillesContainer.appendChild(pastille);
  }

  const allPastilles = document.querySelectorAll(".pastille");
  allPastilles.forEach((pastille, index) => {
    pastille.style.backgroundColor = index === currentIndex ? "#0081FF" : "white";
  });
}


function btn2() {
  resetBorderColor();
  btn2v.style.borderColor = "#0081FF";
  currentCategory = 'python';
  currentIndex = 0;
  updatePastilles()
  afficherProjet();
}
function btn1() {
    resetBorderColor();
    btn1v.style.borderColor = "#0081FF";
    currentCategory = 'php-mysql';
    currentIndex = 0;
    updatePastilles()
    afficherProjet();
  }
  function btn3() {
    resetBorderColor();
    btn3v.style.borderColor = "#0081FF";
    currentCategory = 'html-css-js';
    currentIndex = 0;
    updatePastilles()
    afficherProjet();
  }
  function btn4() {
    resetBorderColor();
    btn4v.style.borderColor = "#0081FF";
    currentCategory = 'wordpress';
    currentIndex = 0;
    updatePastilles()
    afficherProjet();
  }


function resetBorderColor() {
  btn1v.style.borderColor = "white";
  btn2v.style.borderColor = "white";
  btn3v.style.borderColor = "white";
  btn4v.style.borderColor = "white";
}


updatePastilles()
afficherProjet();