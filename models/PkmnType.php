<?php

namespace models;

/**
 * Classe PkmnType
 * Représente un type de pokémon
 */
class PkmnType
{
    private ?int $idType;
    private string $nom;
    private string $UrlImg;

    /**
     * Constructeur d'un type de pokémon
     * @param array $data données à passer au type
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function getIdType(): ?int
    {
        return $this->idType;
    }

    public function setIdType(?int $idType): void
    {
        $this->idType = $idType;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getUrlImg(): string
    {
        return $this->UrlImg;
    }

    public function setUrlImg(string $UrlImg): void
    {
        $this->UrlImg = $UrlImg;
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