<?php


namespace App\Entity;


use App\Core\Entity;

class Product implements Entity
{
    private ?int $id = null;
    private string $name;
    private int $preu;
    private string $logo;
    private string $tipus_id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Product
     */
    public function setId(?int $id): Product
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
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getPreu(): int
    {
        return $this->preu;
    }

    /**
     * @param int $preu
     * @return Product
     */
    public function setPreu(int $preu): Product
    {
        $this->preu = $preu;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return Product
     */
    public function setLogo(string $logo): Product
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipusId(): string
    {
        return $this->tipus_id;
    }

    /**
     * @param string $tipus_id
     * @return Product
     */
    public function setTipusId(string $tipus_id): Product
    {
        $this->tipus_id = $tipus_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            "id"=>$this->getId(),
            "name"=>$this->getName(),
            "logo"=>$this->getLogo(),
            "preu"=>$this->getPreu(),
            "tipus_id"=>$this->getTipusId()
        ];
    }
}