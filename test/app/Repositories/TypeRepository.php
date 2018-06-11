<?php
namespace App\Repositories;

use OzanAkman\RepositoryGenerator\Repository;
use App\Type;
use App\Repositories\Interfaces\TypeRepositoryInterface;

class TypeRepository extends Repository implements TypeRepositoryInterface
{
    public function __construct(Type $model)
    {
        parent::__construct($model);
    }
}