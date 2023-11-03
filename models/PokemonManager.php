<?php

namespace models;

require_once("models/Model.php");
require_once("models/Pokemon.php");

use models\Model;

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

        if($res->rowCount() === 1) {
            $pokemon = new Pokemon();
            $pokemon->hydrate($res);
        }
        else $pokemon = null;

        return $pokemon;
    }

    /**
     * Crée un pokémon en bdd
     * @param Pokemon $pokemon Pokémon à créer
     * @return Pokemon|false Pokémon créé ou faux si échoué
     */
    public function createPokemon(Pokemon $pokemon): Pokemon|false
    {
        $res = false;

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

    public function deletePokemon(int $idPokemon = -1): int
    {
        $sql = "DELETE FROM pokemon WHERE idPokemon = ?";
        $params = [$idPokemon];
        return $this->execRequest($sql, $params)->rowCount();
    }
}