
<?php
include './requetes.php';
include './db.php';


session_start();

// Vérifiez si l'utilisateur est authentifié
if (!isset($_SESSION['identifiant'])) {
    // Redirigez vers la page d'authentification s'il n'est pas authentifié
    header("Location: ../../login.php");
    exit();
}

// Le reste de votre code pour back.php
?>

<!-- tout les formulaires permettant d'interagir avec la database et inclus le ficher contenant les requêtes sql -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="../css/back.css">

<section id="back-container-top-header">
  <h3>BACK-END</h3>
  <a id="back-to-portfolio" href="../../index.php">PORTFOLIO  <i class="fa-solid fa-right-to-bracket" style="color: #000000;"></i></a>
</section>
<main id="container-back">
      <section class="flex-content-back">
        <h2>Vos derniers messages</h2>
          <?php afficher_les_contacts() ?>
        </section>
        <section class="flex-content-back">
          <h2>Vos Projets</h2>
            <?php afficher_les_projets() ?>
      </section>
      <section class="flex-content-back">
        <h2>Vos Compétences</h2>
        <?php afficher_les_compétences() ?>
      </section>
    </main>
    <section id="form-container-back">
    <form action="" method="post" enctype="multipart/form-data">
      <section id="the-container-for-container">
      <div class="container-form-back-for-columns">
        <label for="" class="label-back">ajouter un projet</label>
        <input type="text" placeholder="ajouter son titre" class="input-back" name="titreProjet">
        <input type="file" name="image" id="image" accept="image/*">
        <input type="text" placeholder="ajouter son descriptif" class="input-back" name="descProjet">
        <button>valider</button>
      </div>
    </form>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="container-form-back-for-columns">
        <label class="label-back" for="">ajouter une compétence</label>
        <input type="text" placeholder="ajouter son titre" class="input-back" name="titreComp">
        <input type="file" name="imgComp" id="image" accept="image/*">
        <button>valider</button>
      </div>
    </form>
</section>





<?php

ajouter_un_projet();
ajouter_une_compétence();
supprimer_une_compétence();
supprimer_un_projet();
