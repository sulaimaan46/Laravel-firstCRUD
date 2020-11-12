<?php

namespace App\Http\Controllers;

use App\Models\RegUser;
use Illuminate\Http\Request;

class RegUserController extends Controller
{

    public function __construct(RegUser $reguser){

        $this->user=$reguser;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data=$this->user->where('email',$request->email)->where('password',$request->password)->where('status',1)->first();

         if(isset($data)){

                return view('index');
            
         }else{

            return back()->with('sucess','Sorry You Must Register First');
         }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users=$this->user->create($request->all());

        return redirect("login");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegUser  $regUser
     * @return \Illuminate\Http\Response
     */
    public function show(RegUser $regUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegUser  $regUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RegUser $regUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegUser  $regUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegUser $regUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegUser  $regUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegUser $regUser)
    {
        //
    }
}
