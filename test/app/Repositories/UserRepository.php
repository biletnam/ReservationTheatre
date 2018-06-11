<?php
namespace App\Repositories;

use OzanAkman\RepositoryGenerator\Repository;
use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}