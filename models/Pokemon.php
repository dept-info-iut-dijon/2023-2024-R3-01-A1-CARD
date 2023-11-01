<?php

namespace models;

/**
 * Classe Pokemon
 * Représente un pokémon
 */
class Pokemon
{
    private ?int $id;
    private string $nomEspece;
    private ?string $description;
    private string $typeOne;
    private ?string $typeTwo;
    private ?string $urlImg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
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
}