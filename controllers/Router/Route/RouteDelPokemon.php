<?php

namespace controllers\Router\Route;

require_once('controllers/Router/Route.php');
require_once('controllers/PokemonController.php');

use controllers\Router\Route;
use controllers\PokemonController;

/**
 * Classe RouteDelPokemon
 * Route pour la suppression de pokémon
 */
class RouteDelPokemon extends Route
{
    private PokemonController $controller;

    /**
     * Prépare l'affichage de la page
     * @param PokemonController $controller
     */
    public function __construct(PokemonController $controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Affiche la page après suppression de pokémon
     * @param array $params Paramètres à passer à la page
     * @return void
     */
    protected function get(array $params = []): void
    {
        if (!empty($params['idPokemon']) and is_numeric($params['idPokemon']))
            $idPokemon = $params['idPokemon'];
        else
            throw new Exception("Identifiant de pokémon invalide");

        $this->controller->deletePokemonAndIndex($idPokemon);
    }

    /**
     * Exécute une action
     * @param array $params Paramètres à passer à l'exécution
     * @return void
     */
    protected function post(array $params = []): void
    {
        // TODO: Implement post() method.
    }
}