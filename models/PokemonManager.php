<?php

namespace models;

require_once("models/Model.php");
require_once("models/Pokemon.php");
require_once("config/Config.php");

use config\Config;
use models\Model;
use PDO;

/**
 * Classe PokemonManager
 * Gère les accès à la base de données pour les pokémons
 */
class PokemonManager extends Model
{
    /**
     * Récupère la liste de tous les pokémons en bdd
     * @return array Liste des pokémons
     */
    public function getAll(): array
    {
        $sql = "SELECT * FROM pokemon";
        $stmt = $this->execRequest($sql);
        $res = $stmt->fetchAll();

        $pokemons = [];
        foreach ($res as $pokemon) {
            $p = new Pokemon();
            $p->hydrate($pokemon);
            $pokemons[] = $p;
        }

        return $pokemons;
    }

    /**
     * Récupère un pokémon en bdd avec son identifiant
     * @param int $idPokemon Identifiant du pokémon à récupérer
     * @return Pokemon|null
     */
    public function getById(int $idPokemon): ?Pokemon
    {
        $sql = "SELECT * FROM pokemon WHERE idPokemon = ?";
        $params = [$idPokemon];
        $stmt = $this->execRequest($sql, $params);
        $res = $stmt->fetch();

        if($res) {
            $pokemon = new Pokemon();
            $pokemon->hydrate($res);
        }
        else $pokemon = null;

        return $pokemon;
    }

    public function searchPokemons(array $params): array
    {
        // la requête "SELECT * FROM pokemon WHERE ? LIKE ?" ne fonctionne pas car la colonne à rechercher ne peut pas être passée en paramètre
        //alors j'utilise un switch pour chaque champ possible
        switch($params['champ']) {
            case 'idPokemon':
                $sql = "SELECT * FROM pokemon WHERE idPokemon LIKE ?";
                break;
            case 'nomEspece':
                $sql = "SELECT * FROM pokemon WHERE nomEspece LIKE ?";
                break;
            case 'typeOne':
                $sql = "SELECT * FROM pokemon WHERE typeOne LIKE ?";
                break;
            case 'typeTwo':
                $sql = "SELECT * FROM pokemon WHERE typeTwo LIKE ?";
                break;
            case 'urlImg':
                $sql = "SELECT * FROM pokemon WHERE urlImg LIKE ?";
                break;
            default: // recherche par défaut dans la description des pokémons
                $sql = "SELECT * FROM pokemon WHERE description LIKE ?";
                break;
        }
        $params = ["%".$params["recherche"]."%"];
        $stmt = $this->execRequest($sql, $params);
        $res = $stmt->fetchAll();

        $pokemons = [];
        foreach ($res as $pokemon) {
            $p = new Pokemon();
            $p->hydrate($pokemon);
            $pokemons[] = $p;
        }

        return $pokemons;
    }

    /**
     * Crée un pokémon en bdd
     * @param Pokemon $pokemon Pokémon à créer
     * @return Pokemon|false Pokémon créé ou faux si échoué
     */
    public function createPokemon(Pokemon $pokemon): Pokemon|false
    {
        $res = false;

        if($pokemon->getTypeTwo() === $pokemon->getTypeOne()) $pokemon->setTypeTwo(null);

        $sql = "INSERT INTO pokemon (nomEspece, description, typeOne, typeTwo, urlImg) VALUES (?, ?, ?, ?, ?);";
        if($this->execRequest($sql, [
            $pokemon->getNomEspece(),
            $pokemon->getDescription(),
            $pokemon->getTypeOne(),
            $pokemon->getTypeTwo(),
            $pokemon->getUrlImg()
        ])) {
            $idPokemon = $this->execRequest("SELECT LAST_INSERT_ID()")->fetch()[0];
            $pokemon->setIdPokemon($idPokemon);
            $res = $pokemon;
        }

        // retourne le pokémon créé à l'instant
        return $res;
    }

    /**
     * Modifie un pokémon en bdd
     * @param array $dataPokemon Données du pokémon à modifier
     * @return bool Vrai si le pokémon a été modifié, faux sinon
     */
    public function editPokemon(array $dataPokemon): bool
    {
        $res = false;

        if($dataPokemon["typeTwo"] === $dataPokemon["typeOne"]) $dataPokemon["typeTwo"] = null;

        $sql = "UPDATE pokemon SET nomEspece = ?, description = ?, typeOne = ?, typeTwo = ?, urlImg = ? WHERE idPokemon = ?;";
        if($this->execRequest($sql, [
            $dataPokemon["nomEspece"],
            $dataPokemon["description"],
            $dataPokemon["typeOne"],
            $dataPokemon["typeTwo"] === "null" ? null : $dataPokemon["typeTwo"],
            $dataPokemon["urlImg"],
            $dataPokemon["idPokemon"]
        ])) $res = true;

        // retourne le pokémon modifié à l'instant
        return $res;
    }

    /**
     * Supprime un pokémon de la bdd
     * @param int $idPokemon Pokémon à supprimer
     * @return int Nombre de lignes affectées
     */
    public function deletePokemon(int $idPokemon = -1): int
    {
        $sql = "DELETE FROM pokemon WHERE idPokemon = ?";
        $params = [$idPokemon];
        return $this->execRequest($sql, $params)->rowCount();
    }
}