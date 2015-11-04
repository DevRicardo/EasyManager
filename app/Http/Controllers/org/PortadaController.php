<?php

namespace App\Http\Controllers\org;

use App\Portada;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class PortadaController extends Controller
{

    private $conditions = array();
    private $dir = "";
    public function __construct(){
        $this->conditions = array(
            'imagen'=>'required|image',
            'mensaje'=>'required'
        );
        $this->dir = "asset/img/portadas/";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $portadas = Portada::all();
        $cantidad = count($portadas);

        return view("admin.portada")->with("portadas",$portadas)->with("cantidad",$cantidad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("admin.new_portada");
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

        $file_name = "";
        $validar = Validator::make($request->all(), $this->conditions);

        if($validar->fails()){

             return redirect()->back()->withErrors($validar->errors())->withInput();
        }
        $file_name = $this->uploadImagen($request,$this->dir);
        $portada = new Portada();
        $portada->imagen = $file_name;
        $portada->mensaje = $request->mensaje;
        $portada->estado = 1;
        $portada->save();

        Session::flash('accion', 'ok');
        return redirect()->back();

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

        $portada = Portada::find($id);

        return view("admin.edit_portada")->with("portada",$portada);
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
        unset($this->conditions['imagen']);
        $validator = Validator::make($request->all(), $this->conditions);
        $file_name = "";
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $portada = Portada::find($id);
        if(!empty($request->imagen)){
            $file_name = $this->uploadImagen($request, $this->dir);
            $portada->imagen = $file_name;
            if(!is_file($this->dir.$file_name)){
                return redirect()->back()->withErrors(array("error"=>"No se pudo cargar la imagen"))->withInput();
            }
        }


        $portada->mensaje = $request->mensaje;
        $portada->save();
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
    }


    public function uploadImagen($recuest,$dir){
        $file           = $recuest->file('imagen');
        $ext            = $file->getClientOriginalExtension();
        $name           = $file->getClientOriginalName();
        $hash           = md5($name);

        // open an image file
        $img = Image::make($file);
        // now you are able to resize the instance
        //$img->resize(320, 240);
        //$img->heighten(350);
        // and insert a watermark for example
        //$img->insert('public/watermark.png');
        // finally we save the image as a new file
        $img->save($dir.$hash.'.'.$ext);

        return $hash.'.'.$ext;

    }

}
