<?php

namespace controllers;

require_once("models/PokemonManager.php");
require_once("views/View.php");

use models\PokemonManager;
use views\View;

/**
 * Classe PokemonController
 * Contrôleur pour l'affichage du formulaire d'ajout de pokémons

 */
class PokemonController
{

    /**
     * Affiche la page d'ajout de pokémon
     * @return void
     */
    public function displayAddPokemon(): void
    {
        $addPokemonView = new View('AddPokemon');
        $addPokemonView->generer([]);
    }

    /**
     * Affiche la page d'ajout de type de pokémon
     * @return void
     */
    public function displayAddType(): void
    {
        $addTypeView = new View('AddType');
        $addTypeView->generer([]);
    }

    /**
     * Affiche la page d'édition de pokémon
     * @param array $params Paramètres à passer à la page
     * @return void
     */
    public function displayEditPokemon(array $params): void
    {
        $editPokemonView = new View('AddPokemon');
        $editPokemonView->generer(["idPokemon" => $params["idPokemon"]]);
    }

    /**
     * Supprime un pokémon
     * @param array $params Paramètres à passer à la page
     * @return void
     */
    public function delPokemon(array $params): void
    {
        // création du manager de pokémons
        $manager = new PokemonManager();

        // récupération d'une liste de pokémons, un pokémon, et un pokémon inexistant
        $pokemons = $manager->getAll();

        $delPokemonView = new View('Index');
        $delPokemonView->generer(["pokemons" => $pokemons, "message" => "Le pokémon {$params['idPokemon']} a bien été supprimé"]);
    }
}