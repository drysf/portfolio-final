<?php
include '../../../portfolio/asset/back-end/db.php';

session_start(); // Démarrer la session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST["id"];
    $mot_de_passe_saisi = $_POST["mdp"];

    $stmt = $conn->prepare("SELECT MDP FROM login WHERE id = :identifiant");
    $stmt->bindParam(':identifiant', $identifiant);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        $mot_de_passe_hache = $row['MDP'];

        if (password_verify($mot_de_passe_saisi, $mot_de_passe_hache)) {
            // Authentification réussie, enregistrez l'identifiant dans la session
            $_SESSION['identifiant'] = $identifiant;

            header("Location: ../back-end/back.php");
            exit();
        } else {
            echo "Identifiant ou mot de passe incorrect.";
            session_destroy();
        }
    } else {
        echo "Identifiant ou mot de passe incorrect.";
        session_destroy();
    }
}
?>

