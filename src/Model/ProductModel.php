<?php


namespace App\Model;

use App\Core\App;
use App\Core\Model;
use App\Entity\Product;
use PDO;


class ProductModel extends Model
{
    public function __construct(PDO $pdo, string $tableName = "producte", string $className = Product::class)
    {
        parent::__construct($pdo, $tableName, $className);
    }

    public function  getType (int $id){
        $typeModel = App::getModel(TipusModel::class);
        $type = $typeModel->find($id);
        return $type;
    }
}