<?php

namespace App\Http\Controllers\org;

use App\Colaborador;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Support\Facades\Session;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $conditions = array();

    public function __construct(){

        $this->conditions = array(
            'imagen'=>'required|image',
            'nombre'=>'required',
            'web'=>'required|active_url'
        );

    }

    public function index()
    {
        //
        $colaboradores = Colaborador::all();

        return view('admin.colaborador')->with("colaboradores", $colaboradores);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.new_colaborador");
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
        $dir = 'asset/img/colaboradores/';


        $validator = Validator::make($request->all(), $this->conditions);

        if($validator->fails()){
            return redirect("admin/colaborador/create")->withErrors($validator)->withInput();
        }
        $name_file = $this->uploadImagen($request,$dir);

        if(is_file($dir.$name_file)){

            $colaborador = new Colaborador();
            $colaborador->nombre = $request->nombre;
            $colaborador->imagen = $name_file;
            $colaborador->web = $request->web;
            $colaborador->save();
            Session::flash('accion', 'ok');
            return redirect("admin/colaborador");
        }else{
            return redirect("admin/colaborador/create")->withErrors(array("error"=>"No se pudo guardar la imagen"))->withInput();
        }



    }

    public function uploadImagen($recuest,$dir){
        $file           = $recuest->file('imagen');
        $ext            = $file->getClientOriginalExtension();
        $name           = $file->getClientOriginalName();
        $hash           = md5($name);

        // open an image file
        $img = Image::make($file);
        // now you are able to resize the instance
        $img->heighten(100);
        // and insert a watermark for example
        //$img->insert('public/watermark.png');
        // finally we save the image as a new file
        $img->save($dir.$hash.'.'.$ext);

        return $hash.'.'.$ext;

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
        $colaborador = Colaborador::find($id);
        return view("admin.edit_colaborador")->with("colaborador", $colaborador);
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
        $dir = 'asset/img/colaboradores/';
        unset($this->conditions['imagen']);
        $validator = Validator::make($request->all(), $this->conditions);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name_file = "";
        $colaborador = Colaborador::find($id);
        if(!empty($request->imagen)){
            $name_file = $this->uploadImagen($request,$dir);
            $colaborador->imagen = $name_file;
            if(!is_file($dir.$name_file)){
                return redirect()->back()->withErrors(array("error"=>"No se pudo guardar la imagen"))->withInput();
            }
        }

        $colaborador->nombre = $request->nombre;
        $colaborador->web = $request->web;
        $colaborador->save();
        Session::flash('accion', 'ok');
        return redirect()->back();

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
        $colaborador = Colaborador::find($id);
        $colaborador->delete();
        Session::flash('accion', 'ok');
        return redirect("admin/colaborador");


    }
}
