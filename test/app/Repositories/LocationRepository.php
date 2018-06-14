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

    public function getLocationBySlug($slug)
    {
        //  return Produit::all()->where("catégorie","info");
        return \App\location::with('locality')->where("slug",$slug)->get()->all();

        //$retour = DB::table('locations')->where("slug", $slug);

    }
}