<?php
namespace Database;


class Database {
    private static ?PDO $instance = null; // Instance unique de PDO
    private static string $dsn = 'mysql:host=localhost;dbname=your_database;charset=utf8'; // DSN
    private static string $username = 'your_username'; // Nom d'utilisateur
    private static string $password = 'your_password'; // Mot de passe

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct() {}

    // Méthode pour obtenir l'instance unique de PDO
    public static function getInstance(): PDO {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(self::$dsn, self::$username, self::$password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die('Erreur de connexion : ' . $e->getMessage());
            }
        }

        return self::$instance;
    }

    // Empêche la duplication de l'objet (Singleton)
    private function __clone() {}

    // Empêche la désérialisation de l'objet
    private function __wakeup() {}
}


