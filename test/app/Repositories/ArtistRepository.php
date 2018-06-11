<?php
namespace App\Repositories;

use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

use OzanAkman\RepositoryGenerator\Repository;
use App\Artist;
use App\Repositories\Interfaces\ArtistRepositoryInterface;

class ArtistRepository extends Repository implements ArtistRepositoryInterface
{
    public function __construct(Artist $model)
    {
        parent::__construct($model);
    }

    public $model;

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

    public function getArtists($n)
    {
        //  return Produit::all()->where("catégorie","info");
        $retour = DB::table('Artists')->paginate(15);


        return $retour;
    }


    public function destroy($id)
    {
        $this->getById($id)->delete();
    }


}