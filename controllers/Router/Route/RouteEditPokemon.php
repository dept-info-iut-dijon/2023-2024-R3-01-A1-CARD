<?php

namespace controllers\Router\Route;

require_once('controllers/Router/Route.php');
require_once('controllers/PokemonController.php');

use controllers\Router\Route;
use controllers\PokemonController;
use Exception;

/**
 * Classe RouteEditPokemon
 * Route pour afficher le formulaire d'édition d'un pokémon
 */
class RouteEditPokemon extends Route
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
     * Affiche la page d'édition du pokémon
     * @param array $params Paramètres à passer à la page
     * @return void
     */
    protected function get(array $params = []): void
    {
        if (!empty($params['idPokemon']) and is_numeric($params['idPokemon'])) {
            $idPokemon = $params['idPokemon'];

            $this->controller->displayEditPokemon($idPokemon);
        }
        else
            $this->controller->displayAddPokemon("Identifiant de pokémon invalide");
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
                "urlImg" => parent::getParam($params, "urlImg"),
                "idPokemon" => parent::getParam($params, "idPokemon", false)
            ];
        }
        catch (Exception $e) {
            $this->controller->displayAddPokemon($e->getMessage());
            return;
        }

        $this->controller->editPokemonAndIndex($data);
    }
}