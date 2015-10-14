<?php

namespace App\Http\Controllers\org;

use App\Programa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use DB;

class ProgramaController extends Controller
{

    private $_organizacionid;

    public function __construct(){
        $organizacion = DB::table('organizacion')->first();

        $this->_organizacionid =  $organizacion->id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programas = Programa::all();

        return view('admin.programa')->with("programas",$programas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("admin.new_programa")->with("organizacion", $this->_organizacionid);
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
        $conditions = array(

            "nombre_programa"=> "required",
            "descripcion_programa"=> "required"
        );

        $validator = Validator::make($request->all(), $conditions);

        if($validator->fails()){
            return redirect('admin/programa/create')
                ->withErrors($validator)
                ->withInput();
        }

        $programa = new Programa();
        $programa->nombre_programa = $request->nombre_programa;
        $programa->descripcion_programa = $request->descripcion_programa;
        $programa->organizacion_id = $this->_organizacionid;
        $programa->save();
        Session::flash('accion', 'ok');
        return redirect('admin/programa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $programa = Programa::find($id);

        return view("admin.edit_programa")->with("programa", $programa);
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
        $programa = Programa::find($id);

        $programa->nombre_programa = $request->nombre_programa;
        $programa->descripcion_programa = $request->descripcion_programa;
        $programa->save();
        Session::flash('accion', 'ok');
        return redirect("/admin/programa/".$id."/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
         $progama = Programa::find($id);
         $progama->delete();
        Session::flash('accion', 'ok');
        return redirect("/admin/programa/");

    }
}
