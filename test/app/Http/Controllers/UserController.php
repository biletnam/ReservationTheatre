<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Response;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $request;
    protected $user;

    /**
     *
     *
     */
    public function __construct(Request $request, User $user) {
        $this->request = $request;
        $this->user = $user;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user->all();
        return response()->json(['data' => $user,
            'status' => Response::HTTP_OK]);

        //
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
        $data = $this->request->all();
        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->password = $data['password'];
        $this->user->save();

        return response()->json(['status' => Response::HTTP_CREATED]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->all()->where("id",$id);
        return response()->json(['data' => $user,
            'status' => Response::HTTP_OK]);

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
        $data = $this->request->all();

        $user = $this->user->find($id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();

        return response()->json(['status' => Response::HTTP_OK]);
    }

    //

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->delete();

        return response()->json(['status' => Response::HTTP_OK]);
    }



}
