<?php

namespace controllers\Router\Route;

require_once('controllers/Router/Route.php');
require_once('controllers/PokemonController.php');

use controllers\Router\Route;
use controllers\PokemonController;

/**
 * Classe RouteAddPokemon
 * Route pour la page d'ajout de pokémon
 */
class RouteAddPokemon extends Route
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
     * Affiche la page d'ajout de pokémon
     * @param array $params Paramètres à passer à la page
     * @return void
     */
    protected function get(array $params = []): void
    {
        $this->controller->displayAddPokemon();
    }

    /**
     * Exécute une action
     * @param array $params Paramètres à passer à l'exécution
     * @return void
     */
    protected function post(array $params = []): void
    {
        try {
            $data = [
                "nomEspece" => parent::getParam($params, "nomEspece", false),
                "description" => parent::getParam($params, "description"),
                "typeOne" => parent::getParam($params, "typeOne", false),
                "typeTwo" => (parent::getParam($params, "typeTwo") !== "null") ? parent::getParam($params, "typeTwo") : null,
                "urlImg" => parent::getParam($params, "urlImg")
            ];
        }
        catch (\Exception $e) {
            $this->controller->displayAddPokemon($e->getMessage());
            return;
        }

        $this->controller->addPokemon($data);
    }
}