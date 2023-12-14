<?php

namespace models;

use models\Model;

/**
 * Classe PkmnTypeManager
 * Gère les accès à la base de données pour les types de pokémon
 */
class PkmnTypeManager extends Model
{
    /**
     * Récupère l'ensemble des types de pokémon dans la base de données
     * @return array tableau des types de pokémon
     */
    public function getAll(): array
    {
        $sql = "SELECT * FROM pkmn_type";
        $stmt = $this->execRequest($sql);
        $res = $stmt->fetchAll();

        $types = [];
        foreach($res as $type) {
            $type = new PkmnType($type);
            $types[] = $type;
        }

        return $types;
    }

    /**
     * Retourne un type de pokémon à partir de son ID
     * @param int $idPkmnType id tu type de pokémon cherché
     * @return PkmnType|null retourne un type s'il existe, null sinon
     */
    public function getById(int $idPkmnType): ?PkmnType
    {
        $sql = "SELECT * FROM pkmn_type WHERE idType = ?";
        $stmt = $this->execRequest($sql, [$idPkmnType]);
        $res = $stmt->fetch();

        if ($res) {
            $type = new PkmnType($res);
        }
        else $type = null;

        return $type;
    }

    /**
     * Ajoute un type de pokémon dans la base de données
     * @param PkmnType $pkmn_type informations du type de pokémnon à ajouter en base de données
     * @return PkmnType|false le type de pokémon ajouté, false si échec
     */
    public function createPkmnType(PkmnType $pkmn_type): PkmnType|false
    {
        $res = false;

        $sql = "INSERT INTO pkmn_type(idType, nomType, urlImg) VALUES (?, ?, ?)";
        if ($this->execRequest($sql, [
            $pkmn_type->getNom(),
            $pkmn_type->getUrlImg()
        ])) {
            $idPkmnType = $this->execRequest("SELECT LAST_INSERT_ID()")->fetch()[0];
            $pkmn_type->setIdType($idPkmnType);
            $res = $pkmn_type;
        }

        return $res;
    }

    /**
     * Modifie un type de pokémon dans la base de données
     * @param PkmnType $pkmn_type type de pokémon modifié
     * @return int résultat de la modification en base de données
     */
    public function editPkmnType(PkmnType $pkmn_type): int {
        $sql = "UPDATE pkmn_type SET nomType = ?, urlImg = ? WHERE idType = ?";
        $params = [$pkmn_type->getNom(), $pkmn_type->getUrlImg(), $pkmn_type->getIdType()];
        return $this->execRequest($sql, $params);
    }

    /**
     * Supprime un type de pokémon de la base de données à partir de son ID
     * @param int $idPkmnType id du type de pokémon à supprimer
     * @return int résultat de la suppression
     */
    public function deletePkmnType(int $idPkmnType): int
    {
        $sql = "DELETE FROM pkmn_type WHERE idType = ?";
        return $this->execRequest($sql, [$idPkmnType]);
    }
}