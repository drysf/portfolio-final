<?php

//je déclare les fonctions contenant les requêtes sql

// !!!LES 4 PREMIERES FONCTIONS SONT UTILISEES A LA FIN DU FICHIER "back.php"!!!
function ajouter_un_projet()
{
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['titreProjet']) && isset($_FILES['image']['name']) && isset($_POST['descProjet'])) {
            $titre_projet = $_POST['titreProjet'];
            $desc_projet = $_POST['descProjet'];

            $targetDir = "img/";

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true); 
            }
            $fileName = basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $check = getimagesize($_FILES["image"]["tmp_name"]);

            if ($check !== false) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

                $sql = "INSERT INTO projets (titre, image, descriptif) VALUES ('$titre_projet', '$targetFilePath', '$desc_projet')";

                $conn->query($sql);
            } else {
                echo "File is not an image.";
            }
        }
    }
}

function ajouter_une_compétence()
{
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['titreComp']) && isset($_FILES['imgComp']['name'])) {
            $titre_comp = $_POST['titreComp'];

            $targetDir = "img/";
            $fileName = basename($_FILES["imgComp"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $check = getimagesize($_FILES["imgComp"]["tmp_name"]);

            if ($check !== false) {
                move_uploaded_file($_FILES["imgComp"]["tmp_name"], $targetFilePath);

                $sql = "INSERT INTO compétences (noms, image) VALUES ('$titre_comp', '$targetFilePath')";

                $conn->query($sql);
            } else {
                echo "File is not an image.";
            }
        }
    }
}

function supprimer_une_compétence()
{
    global $conn;
    if (isset($_POST['titreCompDelete'])) {
        $titre_comp_delete = $_POST['titreCompDelete'];
        $sql = "DELETE FROM `compétences` WHERE noms = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1, $titre_comp_delete, PDO::PARAM_STR);

        $stmt->execute();
    }
}

function supprimer_un_projet()
{
    global $conn;
    if (isset($_POST['titreProjetDelete'])) {
        $titre_projet_delete = $_POST['titreProjetDelete'];
        $sql = "DELETE FROM `projets` WHERE titre = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1, $titre_projet_delete, PDO::PARAM_STR);

        $stmt->execute();
    }
}

function afficher_les_projets()
{
    global $conn;

    // Requête de sélection
    $sql = "SELECT * FROM projets";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Afficher les données dans un tableau HTML
        echo '<table class="table-back-content">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Titre</th>';
        echo '<th>Image</th>';
        echo '<th>Descriptif</th>';
        echo '<th>ACTION</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Boucle à travers les résultats
        while ($row = $result->fetch()) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["titre"] . '</td>';
            echo '<td>' . $row["image"] . '</td>';
            echo '<td>' . $row["descriptif"] . '</td>';
            echo '<td>' . '<a href="./ban-id/ban-project.php?id=' . $row['id'] . '">Supprimer</a>' . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "Aucun résultat trouvé.";
    }
}

function afficher_les_compétences()
{
    global $conn;

    $sql = "SELECT * FROM compétences";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        echo '<table class="table-back-content">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Titre</th>';
        echo '<th>Image</th>';
        echo '<th>Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $result->fetch()) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["noms"] . '</td>';
            echo '<td>' . $row["image"] . '</td>';
            echo '<td>' . '<a href="./ban-id/ban-skill.php?id=' . $row['id'] . '">Supprimer</a>' . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "Aucun résultat trouvé.";
    }
}

function inserer_les_emails()
{
    global $conn;
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Requête pour insérer les valeurs 
        $sql = "INSERT INTO contact (email, message) VALUES (:email, :message)";
        $stmt = $conn->prepare($sql);

        // liaison des paramétres pour éviter les injections sql (sécurité)
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        // j'éxecute la requête
        $stmt->execute();
    }
}

function afficher_les_contacts()
{
    global $conn;

    $sql = "SELECT email, message, id FROM contact";
    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<table class="table-back-content">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>EMAIL</th>';
    echo '<th>MESSAGE</th>';
    echo '<th>ACTION</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($resultats as $row) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['message'] . '</td>';
        echo '<td>' . '<a href="./ban-id/ban-contact.php?id=' . $row['id'] . '">Supprimer</a>' . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}