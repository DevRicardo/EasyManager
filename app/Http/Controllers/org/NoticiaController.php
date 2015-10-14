<?php

namespace App\Http\Controllers\org;

use App\Noticia;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class NoticiaController extends Controller
{
    private $conditions = array();
    private $dir = "";
    public function __construct(){
        $this->conditions = array(
            'imagen'=>'required|image',
            'titulo'=>'required',
            'contenido'=>'required'
        );
        $this->dir = "asset/img/noticias/";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $noticias = Noticia::orderBy('id', 'DESC')->get();
        return view("admin.noticia")->with("noticias",$noticias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.new_noticia");
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
        $validator = Validator::make($request->all(), $this->conditions);
        if($validator->fails()){
            return redirect("admin/noticia/create")->withErrors($validator)->withInput();
        }

        $file_name = $this->uploadImagen($request,$this->dir);

        $noticia = new Noticia();
        $noticia->imagen = $file_name;
        $noticia->titulo = $request->titulo;
        $noticia->contenido = $request->contenido;
        $noticia->save();
        Session::flash('accion', 'ok');
        return redirect("admin/noticia");

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
        $noticia = Noticia::find($id);
        return view("admin.edit_noticia")->with("noticia",$noticia);
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
        $noticia = Noticia::find($id);
        if(!empty($request->imagen)){
            $file_name = $this->uploadImagen($request, $this->dir);
            $noticia->imagen = $file_name;
            if(!is_file($this->dir.$file_name)){
                return redirect()->back()->withErrors(array("error"=>"No se pudo cargar la imagen"))->withInput();
            }
        }

        $noticia->titulo = $request->titulo;
        $noticia->contenido = $request->contenido;
        $noticia->save();
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
        $noticia = Noticia::find($id);
        $noticia->delete();
        Session::flash('accion', 'ok');
        return redirect()->back();
    }



    public function uploadImagen($recuest,$dir){
        $file           = $recuest->file('imagen');
        $ext            = $file->getClientOriginalExtension();
        $name           = $file->getClientOriginalName();
        $hash           = md5($name);

        // open an image file
        $img = Image::make($file);
        // now you are able to resize the instance
        $img->resize(320, 240);
        // and insert a watermark for example
        //$img->insert('public/watermark.png');
        // finally we save the image as a new file
        $img->save($dir.$hash.'.'.$ext);

        return $hash.'.'.$ext;

    }
}
