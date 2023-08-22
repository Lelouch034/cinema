<?php
require_once 'app/DAO.php';

class FilmController
{
    // function qui permet de récupérer la liste de tout les films ajoutés en BDD
    public function listFilms()
    {
        $dao = new DAO();

        // Vérifiez si l'ID du film est présent dans l'URL
        if (isset($_GET['id'])) {
            $filmId = $_GET['id'];

            // Préparez la requête SQL pour récupérer les détails du film en fonction de l'ID
            $sql = 'SELECT id_film, title, date_format(date_release, "%Y") year, duration, synopsis, note, picture 
        FROM film
        WHERE id_film = :id_film'; // Utilisez :id_film ici


            // Exécutez la requête SQL en passant l'ID en tant que paramètre
            $film = $dao->executeRequest($sql, [':id_film' => $filmId])->fetch(PDO::FETCH_ASSOC);

            // Vérifiez si le film a été trouvé
            if ($film) {
                // Affichez les détails du film
                require 'view/film/filmDetails.php'; // Créez une vue pour afficher les détails du film
            } else {
                // Gérez le cas où aucun film n'est trouvé pour l'ID spécifié
                echo "Aucun film trouvé pour cet ID.";
            }
        } else {
            // Si aucun ID n'est présent dans l'URL, affichez la liste de tous les films
            $sql = 'SELECT id_film, title, date_format(date_release, "%Y") year, duration, synopsis, note, picture 
                    FROM film
                    ORDER BY date_release DESC';

            $films = $dao->executeRequest($sql);
            require 'view/film/listFilms.php'; // Créez une vue pour afficher la liste des films
        }
    }
}
?>
