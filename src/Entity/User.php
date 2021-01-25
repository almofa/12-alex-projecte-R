<?php declare(strict_types=1);

namespace App\Entity;

use App\Core\Entity;
use App\Model\UserModel;


class User implements Entity
{
    private ?int $id = null;
    private string $username;
    private string $password;
    private string $role;

    /**
     * User constructor.
     * @param int|null $id
     * @param string $username
     * @param string $password
     * @param string $role
     */



    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return User
     */
    public function setId(?int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole(string $role): User
    {
        $this->role = $role;
        return $this;
    }

    public function toArray(): array
    {
        return [
            "id"=>$this->getId(),
            "username"=>$this->getUsername(),
            "password"=>$this->getPassword(),
            "role"=>$this->getRole()
        ];
    }

}
