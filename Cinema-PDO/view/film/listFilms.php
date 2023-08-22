<?php
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="uk-section uk-section-secondary">
    <div class="uk-container">
        <h1>Lists of films <span class="uk-badge"><?= $films->rowCount() ?></span></h1>

        <div class="uk-grid-match uk-flex-center" uk-grid>
            <?php
            while ($film = $films->fetch()) { ?>

                <div class="uk-width-auto uk-height-match" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 500">
                    <div class="uk-card uk-card-small uk-card-default uk-height-match uk-border-rounded">
                        <figure class="uk-height-match uk-border-rounded">
                        <a href=" view/film/filmDetails.php?id=<?= $film['id_film'] ?>"> <!-- lien avec l'ID du film -->
    <img class="uk-border-rounded" src="<?= $film["picture"]; ?>" alt="picture of film : <?= $film["title"]; ?>" width="300">
</a>

                            <figcaption class="uk-text-center uk-margin-small-top uk-margin-small-bottom">
                                <a class="uk-link-toggle" href=""><strong><?= $film['title'] ?></strong></a>
                            </figcaption>
                        </figure>

                    </div>
                </div>

            <?php }
            ?>
        </div>

    </div>
</div>







<?php
$title = "List of Films";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
