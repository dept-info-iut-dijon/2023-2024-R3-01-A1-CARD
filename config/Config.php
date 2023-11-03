<?php

namespace config;

/**
 * Classe Config
 * Représente la configuration de l'application
 */
class Config
{
    private static ?Config $instance = null;

    private string $dsn;
    private string $user;
    private string $pass;

    private function __construct() {
        if (file_exists("config/dev.ini")) {
            $config = parse_ini_file("dev.ini");
            $this->dsn = $config["dsn"];
            $this->user = $config["user"];
            $this->pass = $config["pass"];
        }
        else {
            $this->dsn = "mysql:host=localhost;dbname=table;charset=utf8";
            $this->user = "root";
            $this->pass = "";
        }
    }

    /**
     * Récupère les informations du fichier de configuration
     * @return Config
     */
    public static function getInstance(): Config {
        if (self::$instance === null) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function getDsn(): string
    {
        return $this->dsn;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPass(): string
    {
        return $this->pass;
    }
}