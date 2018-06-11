<?php
namespace App\Repositories;

use OzanAkman\RepositoryGenerator\Repository;
use App\RepresentationUser;
use App\Repositories\Interfaces\RepresentationUserRepositoryInterface;

class RepresentationUserRepository extends Repository implements RepresentationUserRepositoryInterface
{
    public function __construct(RepresentationUser $model)
    {
        parent::__construct($model);
    }
}