<?php
namespace controllers;

require_once("views/View.php");

use views\View;

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
        $indexView = new View('Index');
        $indexView->generer(['nomDresseur' => "Red"]);
    }
}