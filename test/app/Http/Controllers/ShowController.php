<?php

namespace App\Http\Controllers;

use App\Locality;
use App\Location;
use App\Repositories\ShowRepository;
use App\Repositories\LocationRepository;

use App\Representation;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


use App\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function MongoDB\BSON\toJSON;
use PhpParser\JsonDecoder;

class ShowController extends Controller
{
    public $showRepository;

    protected $nbrPerPage = 4;
    protected $show ;
    protected $locationRepository;


    public function __construct(ShowRepository $showRepository, Show $show, LocationRepository $locationRepository)
    {
        $this->showRepository = $showRepository;
        $this->locationRepository = $locationRepository;
        $this->show = $show;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if((Auth::check()))
            {
                    session()->put('locale', Auth::user()->langue);
                }
                else session()->put('locale', 'en');

            }

            app()->setLocale(session('locale'));


        $shows = $this->showRepository->getShows(4);
        $links = $shows->render();
        return view('show', compact('shows', 'links'));

        //
    }
    public function post(Request $request){
        //Desactivate Cross Control in nav!
        $result=($_POST['Imgname']);

        $result = json_encode($result);

        Storage::put('file2.json',$result);
        $this->fetchAPI();

        //    Storage::put('file.txt',$prou);
        //}


    }
    public function fetchAPI(){

        $file=File::get(public_path('storage/file2.json'));
        $file=(json_decode($file));
        foreach($file as $showUnit) {
            $title = ($showUnit->name);
            $slug = ($showUnit->slug);
            $places = $showUnit->placesNames;
            $when = $showUnit->arrayDates;
            $location = new Location();


            foreach($places as $place) {
                //check if slug already exists
                if ($this->locationRepository->getLocationBySlug($place)==[]){
                    $location = new Location();


                $location->slug = $place;
                $location->designation = $place;
                $location->address = "";
                $location->save();
            }}
            $show = new Show();
           foreach($places as $place) {
               $a = $place;
           }
            if (($this->showRepository->getShowBySlug($title) == [])) {
                $location = $this->locationRepository->getLocationBySlug($a);

                $show->price = 0;
                $show->slug = $title; //A changer
                $show->title = $title;
                $show->poster_url = "";
                $show->bookable = 1;
                $show->location_id= $location[0]->id;
                $show->save();
            }
           foreach($when as $repr){
               $location = $this->locationRepository->getLocationBySlug($a);
               $show_id = $this->showRepository->getShowBySlug($showUnit->name);
               $show_id = ($show_id[0]->id);
               $location_id = $location[0]->id;
               $representation = new Representation();
              // $date = \Carbon\Carbon::parse($repr);
              // $date = $date->toDateTimeString();
             //  $representation->when = $date;
//TODO Convertir en DateTime et sauver

           }

        }

            }



    public function export(){
        $this->showRepository->export();
    }

    public function import(Request $request){
        $this->showRepository->import($request->importShows);
    }
    public function showID($id){
        $show = $this->showRepository->getByIdWith($id);
        return view('showID',compact("show"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showRepository->getById($id);



        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
