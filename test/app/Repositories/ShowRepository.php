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
    public function getByIdWith($id)
    {
        return \App\Show::with('location','representations')->where("id",$id)->get()->first();

    }


    public function getShowBySlug($slug)
    {
        //  return Produit::all()->where("catégorie","info");
        return \App\Show::with('location')->where("slug",$slug)->get()->all();

        //$retour = DB::table('locations')->where("slug", $slug);

    }


    public function getShows($n)
    {
        //  return Produit::all()->where("catégorie","info");
        $retour = DB::table('Shows')->paginate($n);


        return $retour;
    }

    public function export()
    {
        $shows = Show::get(); // All Shows
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($shows, ['slug', 'title','poster_url','location_id','bookable','price'])->download();
        $csvExporter->download('test_shows.csv');
    }
    public function import($file='',$delimiter= ','){

        $arrayImport= $this->csvToArray($file,$delimiter);
        if($arrayImport <> false) then :
        {
            foreach ($arrayImport as $entity) {
                $this->store($entity);

            }
        }

    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }




    public function destroy($id)
    {
        $this->getById($id)->delete();
    }


}