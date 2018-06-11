<?php
namespace App\Repositories;

use OzanAkman\RepositoryGenerator\Repository;
use App\ArtisteType;
use App\Repositories\Interfaces\ArtisteTypeRepositoryInterface;

class ArtisteTypeRepository extends Repository implements ArtisteTypeRepositoryInterface
{
    public function __construct(ArtisteType $model)
    {
        parent::__construct($model);
    }
}