<?php

namespace controllers;

require_once("views/View.php");

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
}