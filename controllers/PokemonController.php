<?php

namespace controllers;

require_once("helpers/Message.php");
require_once("models/PokemonManager.php");
require_once("models/Pokemon.php");
require_once("views/View.php");

use helpers\Message;
use models\PokemonManager;
use models\Pokemon;
use views\View;

/**
 * Classe PokemonController
 * Contrôleur pour l'affichage du formulaire d'ajout de pokémons

 */
class PokemonController
{

    /**
     * Affiche la page d'ajout de pokémon
     * @return void
     */
    public function displayAddPokemon(?string $message = null): void
    {
        if($message !== null) $message = new Message($message, "Erreur", "danger");

        $addPokemonView = new View('AddPokemon');
        $addPokemonView->generer(["message" => $message]);
    }

    /**
     * Ajoute un pokémon en bdd
     * @param array $data Données du pokémon à ajouter
     * @return void
     */
    public function addPokemon(array $data): void
    {
        // création du manager de pokémons
        $manager = new PokemonManager();

        // création d'un pokémon
        $pokemon = new Pokemon();
        $pokemon->hydrate($data);

        // ajout du pokémon en bdd
        $pokemon = $manager->createPokemon($pokemon);

        // si le pokémon a bien été créé
        if ($pokemon !== false) {
            $pokemons = $manager->getAll();

            $message = new Message("Le pokémon {$pokemon->getNomEspece()} a bien été ajouté", "Succès", "success");

            // affichage de l'index avec confirmation
            $indexView = new View('Index');
            $indexView->generer(["pokemons" => $pokemons, "message" => $message]);
        }
        else {
            // affichage de la page d'ajout avec erreur
            $this->displayAddPokemon("Le pokémon n'a pas pu être ajouté");
        }
    }

    /**
     * Affiche la page d'ajout de type de pokémon
     * @return void
     */
    public function displayAddType(): void
    {
        $addTypeView = new View('AddType');
        $addTypeView->generer([]);
    }

    /**
     * Affiche la page d'édition de pokémon
     * @param int $idPokemon Identifiant du pokémon à éditer
     * @return void
     */
    public function displayEditPokemon(int $idPokemon): void
    {
        // création du manager de pokémons
        $manager = new PokemonManager();

        // récupération du pokémon
        $pokemon = $manager->getById($idPokemon);

        if($pokemon !== null) {
            $editPokemonView = new View('AddPokemon');
            $editPokemonView->generer(["pokemon" => $pokemon]);
        }
        else
            $this->displayAddPokemon("Le pokémon {$idPokemon} n'existe pas");
    }

    /**
     * Modifie un pokémon avec les données passées en paramètre
     * @param array $dataPokemon Nouvelles données du pokémon
     * @return void
     */
    public function editPokemonAndIndex(array $dataPokemon): void
    {
        $manager = new PokemonManager();

        $pokemon = $manager->getById($dataPokemon['idPokemon']);

        if($pokemon !== null) {
            $manager->editPokemon($dataPokemon);

            $pokemons = $manager->getAll();

            $message = new Message("Le pokémon {$pokemon->getNomEspece()} a été mis à jour", "Pokémon modifié", "success");

            $indexView = new View('Index');
            $indexView->generer(['pokemons' => $pokemons, "msgType" => "success", "message"=> $message]);
        }
        else
            $this->displayAddPokemon("Le pokémon n'a pas pu être modifié");
    }

    /**
     * Supprime un pokémon
     * @param array $params Paramètres à passer à la page
     * @return void
     */
    public function deletePokemonAndIndex(int $idPokemon): void
    {
        // création du manager de pokémons
        $manager = new PokemonManager();

        // suppression du pokémon
        if ($manager->deletePokemon($idPokemon) > 0) {
            $message = new Message("Le pokémon {$idPokemon} a bien été supprimé", "Succès", "success");
        }
        else {
            $message = new Message("Le pokémon {$idPokemon} n'a pas pu être supprimé", "Erreur", "danger");
        }

        // récupération d'une liste de pokémons, un pokémon, et un pokémon inexistant
        $pokemons = $manager->getAll();

        // affiche l'index avec le message
        $delPokemonView = new View('Index');
        $delPokemonView->generer(["pokemons" => $pokemons, "message" => $message]);
    }
}