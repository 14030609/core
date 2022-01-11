<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use App\Models\PostModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias= CategoriaModel::orderBy('clave_categoria','ASC')->get();
//        $posts= PostModel::where('activo_sn', 'true')->orderBy('clave_post','ASC')->get();
        return view('blog.post', compact('categorias'));
    }

    public function getposts(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('catalogo_post as p')
                ->leftJoin('catalogo_categoria as pe','pe.clave_categoria', '=', 'p.clave_categoria')
                ->select('p.*', 'pe.categoria')
                ->orderBy('p.clave_post','ASC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-primary" data-clave="'.$row->clave_post.'">Editar</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-transparent" data-toggle="modal" data-target="#modal-preguntar-borrar" data-clave="'.$row->clave_post.'">Eliminar</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
        $post                        = new PostModel;

        if($request->hasFile('imagen'))
        {
            $file=$request->file('imagen');
            $name=time()."_imagen".'.'.$file->getClientOriginalExtension();
            //$file->move(public_path().'/img/',$name);
            $file->move(public_path().'/imagen/',$name);
            //$file->move(public_path().'/imagen/',$name);
            $foto=$name;

            $current_timestamp           = date ('Y-m-d H:i:s');
            $post->clave_categoria       = $request['clave_categoria'];
            $post->clave_usuario         = null;
            $post->contenido             = $request['contenido'];
            $post->descripcion           = $request['descripcion'];
            $post->imagen                = $foto;
            $post->titulo                = $request['titulo'];
            $post->fecha_alta            = $current_timestamp;
            $post->save();
        }
        return $post;
    }

    public function inicioSesion(Request $request)
    {
//        header('Access-Control-Allow-Origin: *');
        session(['activo' => '0']);
        if($request['correo']=='core@correo.com' ) {
            if ($request['contrasenia'] == '123456789') {
                session(['activo' => '1']);
                //return redirect()->route('post');
                //return redirect('/post');
            }
            return 1;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=PostModel::findOrFail($id);

        $href =public_path('imagen/'.$post->imagen);
        $post->href = $href;

        return view('single-post', compact('post'));


    }

    public function showEdit($id)
    {
        return PostModel::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PostModel $postModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
//    public function update($id,Request $request)
//    {
//        return $request;
//        $foto=null;
//        if($request->hasFile('imagen'))
//        {
//            $file=$request->file('imagen');
//            $name=time()."_imagen".'.'.$file->getClientOriginalExtension();
//            //$file->move(public_path().'/img/',$name);
//            $file->move(public_path().'/imagen/',$name.'.'.$file->getClientOriginalExtension());
//            //$file->move(public_path().'/imagen/',$name);
//            $foto=$name;
//
//        }
//        $current_timestamp           = date ('Y-m-d H:i:s');
//        $post                        =PostModel::findOrFail($id);
//        $post->clave_categoria       = $request['clave_categoria'];
//        $post->clave_usuario         = null;
//        $post->imagen                = $foto;
//        $post->contenido             = $request['contenido'];
//        $post->descripcion           = $request['descripcion'];
//        $post->imagen                = $request['imagen'];
//        $post->titulo                = $request['titulo'];
//
//        $post->save();
//
//    }
//
    function update(Request $request) {

        $post=PostModel::findOrFail($request['clave_post']);
        $foto=null;
        if($request->hasFile('imagen'))
        {
            $file=$request->file('imagen');
            $name=time()."_imagen".'.'.$file->getClientOriginalExtension();
            //$file->move(public_path().'/img/',$name);
            $file->move(public_path().'/imagen/',$name.'.'.$file->getClientOriginalExtension());
            //$file->move(public_path().'/imagen/',$name);
            $foto=$name;

        }
        $current_timestamp           = date ('Y-m-d H:i:s');
        $post->clave_categoria       = $request['clave_categoria'];
        $post->clave_usuario         = null;
        $post->contenido             = $request['contenido'];
        $post->descripcion           = $request['descripcion'];
        $post->imagen                = $foto;
        $post->titulo                = $request['titulo'];
        $post->fecha_alta            = $current_timestamp;
        $post->save();

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=PostModel::findOrFail($id);
        $post->delete();

    }
}

