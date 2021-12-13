<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias= CategoriaModel::orderBy('clave_categoria','ASC')->get();
        return view('blog.categoria', compact('categorias'));
    }
    public function getCategorias(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('catalogo_categoria as p')
                ->select('p.*')
                ->orderBy('p.clave_categoria','ASC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a class="edit btn btn-primary" data-toggle="modal" data-target="#modal-categoria"  data-clave="'.$row->clave_categoria.'" data-categoria="'.$row->categoria.'" title="Editar">Editar</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-transparent" data-toggle="modal" data-target="#modal-preguntar-borrar" data-clave="'.$row->clave_categoria.'">Eliminar</a>';
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
        $categoria                      = new CategoriaModel;
        $current_timestamp              = date ('Y-m-d H:i:s');
        $categoria->categoria           = $request['categoria'];
        $categoria->save();

        return $categoria;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoriaModel  $categoriaModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria=CategoriaModel::findOrFail($id);
        return $categoria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoriaModel  $categoriaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaModel $categoriaModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoriaModel  $categoriaModel
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $current_timestamp              = date ('Y-m-d H:i:s');
        $categoria                      =CategoriaModel::findOrFail($id);
        $categoria->categoria           = $request['categoria'];

        $categoria->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriaModel  $categoriaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria=CategoriaModel::findOrFail($id);
        $categoria->delete();

    }
}
