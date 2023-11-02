<?php
namespace controllers;

require_once("views/View.php");
require_once("models/PokemonManager.php");

use views\View;
use models\PokemonManager;

/**
 * Classe MainController
 * Contrôleur principal
 */
class MainController
{
    /**
     * Affiche la page d'accueil
     * @return void
     */
    public function Index(): void
    {
        // création du manager de pokémons
        $manager = new PokemonManager();

        // récupération d'une liste de pokémons, un pokémon, et un pokémon inexistant
        $pokemons = $manager->getAll();

        // affichage de la vue
        $indexView = new View('Index');
        $indexView->generer(["pokemons" => $pokemons]);
    }

    /**
     * Affiche la page de recherche de pokémon
     * @return void
     */
    public function Search(): void
    {
        $searchView = new View('Search');
        $searchView->generer([]);
    }
}