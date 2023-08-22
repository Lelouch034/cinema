<?php
require_once('controller/FilmController.php');

// Créez une instance du contrôleur
$filmController = new FilmController();

// Appelez la méthode pour obtenir les détails du film en fonction de l'ID
$filmController->listFilms();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Les en-têtes et les styles nécessaires -->
</head>
<body>
    <!-- Affichez ici les détails du film -->
    <?php if ($film): ?>
        <h1><?= $film['title'] ?></h1>
        <p>Date de sortie : <?= $film['year'] ?></p>
        <p>Durée : <?= $film['duration'] ?></p>
        <p>Synopsis : <?= $film['synopsis'] ?></p>
        <!-- Autres détails du film à afficher ici -->
    <?php else: ?>
        <p>Aucun film trouvé pour cet ID.</p>
    <?php endif; ?>

    <!-- Autres éléments HTML de la page -->
</body>
</html>

