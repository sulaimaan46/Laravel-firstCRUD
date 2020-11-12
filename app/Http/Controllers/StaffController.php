<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class StaffController extends Controller
{

    public function __construct(Staff $staff)
    {
        $this->staff=$staff;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('crudeindexpage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function views()
    {
        $data=$this->staff->where('status',1)->orderBy('name')->get();
    //    sort();
       
        return view('crudview',["staff"=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp=$this->staff->create($request->all());

        return redirect('crudview')->with('successed','Insert Staff Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $staff= $this->staff->where('status',1)->where('id',$id)->first();

    //    dd($staff);
       return view('crudedit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
     
        $employee = $this->staff->find($request->id)->update($request->all());

        return redirect('/crudview')->with('sucessfully',"Updated Sucessfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $rec=$this->staff->where('id',$id)->delete();


        Session::flash('delete','Deleted Sucessfully.');
        // return back()->with('sucess',"Deleted Sucessfully");
        return response()->json(['msg'=>"Deleted Sucessfully"], 200);
        
    }
}
