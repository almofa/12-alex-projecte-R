<?php


namespace App\Model;

use App\Core\Model;
use App\Entity\Genre;
use App\Entity\Tipus;
use PDO;

class TipusModel extends Model
{
    public function __construct(PDO $pdo, string $tableName = "tipus", string $className = Tipus::class)
    {
        parent::__construct($pdo, $tableName, $className);
    }
}