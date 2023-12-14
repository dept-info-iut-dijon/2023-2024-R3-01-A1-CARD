<?php

namespace models;

use Exception;

/**
 * Classe Pokemon
 * Représente un pokémon
 */
class Pokemon
{
    private ?int $idPokemon;
    private string $nomEspece;
    private ?string $description;
    private PkmnType $typeOne;
    private ?PkmnType $typeTwo;
    private ?string $urlImg;

    public function getIdPokemon(): ?int
    {
        return $this->idPokemon;
    }

    public function setIdPokemon(?int $id): void
    {
        $this->idPokemon = $id;
    }

    public function getNomEspece(): string
    {
        return $this->nomEspece;
    }

    public function setNomEspece(string $nomEspece): void
    {
        $this->nomEspece = $nomEspece;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getUrlImg(): ?string
    {
        return $this->urlImg;
    }

    public function setUrlImg(?string $urlImg): void
    {
        $this->urlImg = $urlImg;
    }

    public function getTypeOne(): PkmnType
    {
        return $this->typeOne;
    }

    public function setTypeOne(PkmnType|int $typeOne): void
    {
        // si le type est un entier, on recherche le type correspondant par son ID
        if (is_int($typeOne)) {
            $pkmnTypeManager = new PkmnTypeManager();
            $typeOne = $pkmnTypeManager->getById($typeOne);

            //Exception lancée si le type demandé n'existe pas en base de données
            if ($typeOne == null) throw new Exception("Le premier type du pokémon est introuvable.");
        }

        $this->typeOne = $typeOne;
    }

    public function getTypeTwo(): ?PkmnType
    {
        return $this->typeTwo;
    }

    public function setTypeTwo(PkmnType|int|null $typeTwo): void
    {
        // si le type est un entier, on recherche le type correspondant par son ID
        if (is_int($typeTwo)) {
            $pkmnTypeManager = new PkmnTypeManager();
            $typeTwo = $pkmnTypeManager->getById($typeTwo);

            //Exception lancée si le type demandé n'existe pas en base de données
            if ($typeTwo == null) throw new Exception("Le deuxième type du pokémon est introuvable.");
        }

        $this->typeTwo = $typeTwo;
    }

    public function hydrate(array $donnees): void
    {
        foreach ($donnees as $key => $value) {
            $method = "set" . ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}