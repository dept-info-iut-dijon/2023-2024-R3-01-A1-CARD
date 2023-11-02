<?php

namespace controllers\Router\Route;

require_once('controllers/Router/Route.php');
require_once('controllers/PokemonController.php');

use controllers\Router\Route;
use controllers\PokemonController;

class RouteAddPokemon extends Route
{
    private PokemonController $controller;

    public function __construct(PokemonController $controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }
    protected function get(array $params = [])
    {
        $this->controller->displayAddPokemon();
    }

    protected function post(array $params = [])
    {
        // TODO: Implement post() method.
    }
}