<?php

namespace App\Http\Controllers\org;

use App\Organizacion;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserFormRequest;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrganizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $id;

    public function __construct(){
        $this->id = $this->id();
    }

    public function index()
    {
        //
    }

    public function id(){
        $organizacion = DB::table('organizacion')->first();

        return $organizacion->id;
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
    public function show($id,Request $request)
    {
        //
        $organizacion = Organizacion::find($this->id);

        if($request->ajax()){
            return json_encode($organizacion);
        }else{
            return view('admin.organizacion')->with("organizacion",$organizacion);
        }
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
        $org = Organizacion::find($id);
        $org->nombre = $request->nombre;
        $org->direccion = $request->direccion;
        $org->fijo = $request->fijo;
        $org->celular = $request->celular;
        $org->email = $request->email;
        $org->web = $request->web;
        $org->mision = $request->mision;
        $org->vision = $request->vision;
        $org->principios = $request->principios;
        $org->save();
        Session::flash('accion', 'ok');
        return redirect('admin/organizacion/'.$id);



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
