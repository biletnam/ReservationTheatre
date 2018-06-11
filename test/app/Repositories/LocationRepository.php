<?php
namespace App\Repositories;

use OzanAkman\RepositoryGenerator\Repository;
use App\Location;
use App\Repositories\Interfaces\LocationRepositoryInterface;

class LocationRepository extends Repository implements LocationRepositoryInterface
{
    public function __construct(Location $model)
    {
        parent::__construct($model);
    }
}