<?php

include '../../back-end/db.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupUser = $conn->prepare('SELECT * FROM contact WHERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0) {
        $bannirUser = $conn->prepare('DELETE FROM contact WHERE id = ?');
        $bannirUser->execute(array($getid));

        header('Location: ../back.php');
    }
} else {
    echo "L'identifiant n'a pas été récupéré";
}

?>