<?php

namespace views;

/**
 * Classe View
 * Représente une vue
 */
class View
{
    private string $fichier;
    private string $titre;

    /**
     * Constructeur de la vue
     * @param string $action Action à laquelle la vue est associée
     */
    public function __construct(string $action)
    {

    }

    /**
     * Génère et affiche la vue
     * @param array $donnees Données nécessaires à la vue
     * @return void
     */
    public function generer(array $donnees): void
    {

    }

    /**
     * Génère un fichier de vue et renvoie le résultat produit
     * @param string $fichier Fichier à générer
     * @param array $donnees Données nécessaires à la vue
     * @return void
     */
    private function genererFichier(string $fichier, array $donnees)
    {

    }
}