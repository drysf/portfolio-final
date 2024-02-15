<?php


$servername = "";
$username = "";
$password = "";
$dbname = "portfolio";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurer les erreurs PDO pour être gérées comme des exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "La connexion à la base de données a échoué: " . $e->getMessage();
}

?>
