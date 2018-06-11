<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use OzanAkman\RepositoryGenerator\Repository;
use App\Show;
use App\Repositories\Interfaces\ShowRepositoryInterface;

class ShowRepository extends Repository implements ShowRepositoryInterface
{

    public $model;

    public function __construct(Show $model)
    {
        parent::__construct($model);
    }


    public function getPaginate($n)
    {
        return $this->model->paginate($n);
    }

    public function store(Array $inputs)
    {
        return $this->model->create($inputs);
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getShows($n)
    {
        //  return Produit::all()->where("catégorie","info");
        $retour = DB::table('Shows')->paginate($n);


        return $retour;
    }


    public function destroy($id)
    {
        $this->getById($id)->delete();
    }


}