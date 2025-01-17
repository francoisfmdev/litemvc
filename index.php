<?php
session_start();
require 'vendor/autoload.php';

use Controllers\HomeController;
use Controllers\UserController;
use Database\Database;

// Créer une instance du routeur
$router = new AltoRouter();

// Définir le chemin de base
$router->setBasePath('/lightmvc');




// Définir les routes
$router->map('GET', '/', function () {
    
    $db = Database::getInstance();
    $homeController = new HomeController($db);
    $homeController->index();
});
$router->map('GET', '/inscription', function () {
    
    $db = Database::getInstance();
    $userController = new UserController($db);
    $userController->inscription();
});
$router->map('GET', '/connection', function () {
    
    $db = Database::getInstance();
    $userController = new UserController($db);
    $userController->index();
});

// Matcher et gérer la requête
$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    // Débogage des paramètres de la route
    

    // Appeler la fonction cible
    call_user_func_array($match['target'], $match['params']);
} else {
    // Aucun chemin correspondant, renvoyer une erreur 404
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo 'Page introuvable.';
}
