<?php

namespace App\Entity;

use App\Core\Entity;

class Genre implements Entity
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var int
     */
    private int $number_of_movies;

    /**
     * @return int
     */
    public function getNumberOfMovies(): int
    {
        return $this->number_of_movies;
    }

    /**
     * @param int $number_of_movies
     */
    public function setNumberOfMovies(int $number_of_movies): void
    {
        $this->number_of_movies = $number_of_movies;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Genre
     */
    public function setId(int $id): Genre
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Genre
     */
    public function setName(string $name): Genre
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return ["id" => $this->getId(),
            "name" => $this->getName(),
            "number_of_movies" => $this->getNumberOfMovies()
        ];
    }



}