<?php

namespace models;

/**
 * Classe Pokemon
 * Représente un pokémon
 */
class Pokemon
{
    private ?int $idPokemon;
    private string $nomEspece;
    private ?string $description;
    private string $typeOne;
    private ?string $typeTwo;
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

    public function getTypeOne(): string
    {
        return $this->typeOne;
    }

    public function setTypeOne(string $typeOne): void
    {
        $this->typeOne = $typeOne;
    }

    public function getTypeTwo(): ?string
    {
        return $this->typeTwo;
    }

    public function setTypeTwo(?string $typeTwo): void
    {
        $this->typeTwo = $typeTwo;
    }

    public function getUrlImg(): ?string
    {
        return $this->urlImg;
    }

    public function setUrlImg(?string $urlImg): void
    {
        $this->urlImg = $urlImg;
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