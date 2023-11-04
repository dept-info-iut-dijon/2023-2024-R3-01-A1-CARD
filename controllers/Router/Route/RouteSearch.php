<?php

namespace controllers\Router\Route;

require_once('controllers/Router/Route.php');
require_once('controllers/MainController.php');

use controllers\Router\Route;
use controllers\MainController;

/**
 * Classe RouteSearch
 * Route pour la page de recherche de pokémon
 */
class RouteSearch extends Route
{
    private MainController $controller;

    /**
     * Prépare l'affichage de la page
     * @param MainController $controller
     */
    public function __construct(MainController $controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Affiche la page de recherche de pokémon
     * @param array $params Paramètres à passer à la page
     * @return void
     */
    protected function get(array $params = []): void
    {
        $this->controller->Search();
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
                'recherche' => $this->getParam($params, 'recherche', false),
                'champ' => $this->getParam($params, 'champ', false)
            ];
        }
        catch (\Exception $e) {
            $this->controller->Exception(["error" => $e->getMessage()]);
            return;
        }

        $this->controller->Search($data);
    }
}