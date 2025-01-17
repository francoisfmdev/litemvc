<?php
namespace Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    protected $twig;

    public function __construct()
    {
        try {
            // Initialisation de Twig
            $loader = new FilesystemLoader(__DIR__ . '/../views');
            $this->twig = new Environment($loader, [
                'debug' => true, // Active le mode debug
                'cache' => false, // Désactive le cache pendant le développement
            ]);
            
        } catch (\Exception $e) {
            echo "Error initializing Twig: " . $e->getMessage();
        }
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
