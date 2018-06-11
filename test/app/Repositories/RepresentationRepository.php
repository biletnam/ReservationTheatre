<?php
namespace App\Repositories;

use OzanAkman\RepositoryGenerator\Repository;
use App\Representation;
use App\Repositories\Interfaces\RepresentationRepositoryInterface;

class RepresentationRepository extends Repository implements RepresentationRepositoryInterface
{
    public function __construct(Representation $model)
    {
        parent::__construct($model);
    }
}