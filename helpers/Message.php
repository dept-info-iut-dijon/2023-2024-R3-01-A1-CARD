<?php

namespace helpers;

class Message
{
    private string $message;
    private string $color;
    private string $title;

    const MESSAGE_SUCCESS = "success";
    const MESSAGE_DANGER = "danger";

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