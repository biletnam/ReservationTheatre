<?php
namespace App\Repositories;

use OzanAkman\RepositoryGenerator\Repository;
use App\Locality;
use App\Repositories\Interfaces\LocalityRepositoryInterface;

class LocalityRepository extends Repository implements LocalityRepositoryInterface
{
    public function __construct(Locality $model)
    {
        parent::__construct($model);
    }
}