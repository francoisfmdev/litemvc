<?php

namespace Controllers;

use PDO;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    protected Environment $twig;
    protected PDO $db;

    public function __construct(PDO $database)
    {
        $this->db = $database;

        // Initialisation de Twig
        $loader = new FilesystemLoader(__DIR__ . '/../views');
        $this->twig = new Environment($loader, [
            'debug' => true, // Active le mode debug
            'cache' => false, // Désactive le cache pendant le développement
        ]);
    }

    public function render(string $template, array $data = [])
    {
        try {
            echo $this->twig->render($template, $data);
        } catch (\Twig\Error\Error $e) {
            echo "Error rendering template: " . $e->getMessage();
            error_log($e->getMessage());
        }
    }
}
