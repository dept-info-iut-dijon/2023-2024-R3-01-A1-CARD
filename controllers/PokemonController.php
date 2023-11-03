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
    public function displayAddPokemon(?string $message = null): void
    {
        $addPokemonView = new View('AddPokemon');
        $addPokemonView->generer(["message" => $message]);
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
     * @param int $idPokemon Identifiant du pokémon à éditer
     * @return void
     */
    public function displayEditPokemon(int $idPokemon): void
    {
        $editPokemonView = new View('AddPokemon');
        $editPokemonView->generer(["idPokemon" => $idPokemon]);
    }

    /**
     * Supprime un pokémon
     * @param array $params Paramètres à passer à la page
     * @return void
     */
    public function delPokemon(int $idPokemon): void
    {
        // création du manager de pokémons
        $manager = new PokemonManager();

        // récupération d'une liste de pokémons, un pokémon, et un pokémon inexistant
        $pokemons = $manager->getAll();

        $delPokemonView = new View('Index');
        $delPokemonView->generer(["pokemons" => $pokemons, "message" => "Le pokémon {$idPokemon} a bien été supprimé"]);
    }
}