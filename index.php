<?php

require_once('controllers/Router/Router.php');

use controllers\Router\Router;

// Routeur
$routeur = new Router();
$routeur->routing($_GET, $_POST);