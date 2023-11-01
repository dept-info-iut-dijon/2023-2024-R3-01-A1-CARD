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
        $pokemons = $stmt->fetchAll();

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
        $stmt->fetch();

        if($stmt->rowCount() === 1) {
            $pokemon = new Pokemon();
        }
        else $pokemon = null;

        return $pokemon;
    }
}