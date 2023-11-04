<?php

namespace helpers;

/**
 * Classe Message
 * Gère les messages d'erreur
 */
class Message
{
    private string $message;
    private string $color;
    private string $title;

    /**
     * @param string $message Message à afficher
     * @param string $title Titre du message
     * @param string $color Couleur du message
     */
    public function __construct(string $message, string $title = "Erreur", string $color = "danger")
    {
        $this->setMessage($message);
        $this->setTitle($title);
        $this->setColor($color);
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}