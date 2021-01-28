<?php


namespace App\Entity;


use App\Core\Entity;

class Tipus implements Entity
{
    private int $id;
    private string $nom;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Tipus
     */
    public function setId(int $id): Tipus
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Tipus
     */
    public function setNom(string $nom): Tipus
    {
        $this->nom = $nom;
        return $this;
    }


    /**
     * @return array
     */
    public function toArray(): array
    {
        return ["id" => $this->getId(),
            "nom" => $this->getNom()

        ];
    }
}