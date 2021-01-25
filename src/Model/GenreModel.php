<?php declare(strict_types=1);

namespace App\Model;


use App\Core\Model;
use App\Entity\Genre;
use PDO;

class GenreModel extends Model
{
    public function __construct(PDO $pdo, string $tableName = "genre", string $className = Genre::class)
    {
        parent::__construct($pdo, $tableName, $className);
    }
}