<?php
declare(strict_types=1);

namespace App\Model;

use App\Core\Model;
use App\Entity\Partner;
use PDO;

class PartnerModel extends Model
{
    public function __construct(PDO $pdo, string $tableName = "partner", string $className = Partner::class)
    {
        parent::__construct($pdo, $tableName, $className);
    }
}