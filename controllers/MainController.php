<?php
namespace controllers;

require_once("views/View.php");
require_once("models/PokemonManager.php");
require_once("models/Pokemon.php");

use models\Pokemon;
use ReflectionClass;
use ReflectionProperty;
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
    public function Search(?array $params = null): void
    {
        $data = null;
        $pokemons = [];

        if($params != null)
        {
            $data = [
                'recherche' => $params['recherche'],
                'champ' => $params['champ']
            ];

            $manager = new PokemonManager();
            $pokemons = $manager->searchPokemons($params);
        }

        $champs = (new ReflectionClass(new Pokemon()))->getProperties(ReflectionProperty::IS_PRIVATE);
        $searchView = new View('Search');
        $searchView->generer(["champs" => $champs, "data" => $data, "pokemons" => $pokemons]);
    }

    public function Exception(?array $params = null): void
    {
        $notFoundView = new View('NotFound');
        $notFoundView->generer($params);
    }
}