<?php
namespace App\Repositories;

use OzanAkman\RepositoryGenerator\Repository;
use App\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository extends Repository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
}