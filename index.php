<?php
require_once('controllers/MainController.php');

use controllers\MainController;

// Affichage de l'index
$controller = new MainController();
$controller->Index();