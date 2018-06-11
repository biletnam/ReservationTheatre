<?php
namespace App\Repositories;

use OzanAkman\RepositoryGenerator\Repository;
use App\ArtisteTypeShow;
use App\Repositories\Interfaces\ArtisteTypeShowRepositoryInterface;

class ArtisteTypeShowRepository extends Repository implements ArtisteTypeShowRepositoryInterface
{
    public function __construct(ArtisteTypeShow $model)
    {
        parent::__construct($model);
    }
}