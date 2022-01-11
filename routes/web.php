<?php

use App\Models\CategoriaModel;
use App\Models\PostModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\CategoriaController;
 use App\Http\Controllers\PostController;
 use App\Http\Controllers\ComentarioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cotizacion', function () {return view('cotizacion');});
Route::get('/servicios', function () {return view('about');});
Route::get('/contactos', function () {return view('contacts');});
Route::get('/empleo', function () {return view('empleo');});
Route::get('/nosotros', function () {return view('services');});




Route::get('/', function () {
    return view('index');
});
Route::get('/2', function () {
    return view('home2');
});

Route::get('/singin', function () {
    return view('login');
});

Route::get('/categoria', function () {
    return view('blog/categoria');
});


Route::get('/comentario', function () {
    return view('blog/comentario');
});

Route::get('/blog', function () {
    $post= DB::table('catalogo_post as p')
        ->join('catalogo_categoria as c','c.clave_categoria','=','p.clave_categoria')
        ->get();
    $categorias= CategoriaModel::orderBy('clave_categoria','ASC')->get();

    return view('blog', compact('post','categorias'));
});

Route::get('/single-post/{id}', function ($id) {
    $post= DB::table('catalogo_post as p')
        ->join('catalogo_categoria as c','c.clave_categoria','=','p.clave_categoria')
        ->where('p.clave_post','=',$id)
        ->first();
    $comentarios= DB::table('catalogo_comentario')
        ->where('clave_post','=',$id)
        ->get();
    return view('single-post', compact('post', 'comentarios'));
});

Route::get('/single-post', function () {
    return view('single-post');
});

Route::get('/logout', function () {
    session(['activo' => '0']);
   return redirect('/singin');
});



//-----------------------Categorias-----------------------------------
Route::get('/almacen/categoria', [CategoriaController::class, 'index'])->name('categorias');
Route::get('/almacen/categorias/list', [CategoriaController::class, 'getCategorias'])->name('categorias.list');
//Route::get('/almacen/categorias/list/all', [CategoriaController::class, 'getAll'])->name('categorias.all');
Route::post('/almacen/categoria', [CategoriaController::class, 'store'])->name('categoria-store');
Route::put('/categoria/update/{id}',[CategoriaController::class, 'update'])->name('categoria-update');
Route::delete('/almacen/categoria/delete/{id}',[CategoriaController::class, 'destroy'])->name('categoria-delete-id');

//-----------------------End Categorias--------------------------------


//-----------------------Comentarios-----------------------------------
Route::get('/comentario', [ComentarioController::class, 'index'])->name('comentario');
Route::get('/comentario/list', [ComentarioController::class, 'getcomentarios'])->name('comentario.list');
//Route::get('/almacen/categorias/list/all', [CategoriaController::class, 'getAll'])->name('categorias.all');
Route::post('/comentario', [ComentarioController::class, 'store'])->name('comentario-store');
Route::put('/comentario/update/{id}',[ComentarioController::class, 'update'])->name('comentario-update');
Route::delete('/comentario/delete/{id}',[ComentarioController::class, 'destroy'])->name('comentario-delete-id');
//----------------------- End Comentarios-----------------------------------

//-----------------------Post-----------------------------------
Route::get('/post', [PostController::class, 'index'])->name('post');
Route::post('/inicioSesion', [PostController::class, 'inicioSesion'])->name('inicio-sesion');

Route::get('/post/list', [PostController::class, 'getposts'])->name('post.list');
//Route::get('/almacen/categorias/list/all', [CategoriaController::class, 'getAll'])->name('categorias.all');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post-show');
Route::get('/postEdit/{id}', [PostController::class, 'showEdit'])->name('post-show-edit');
Route::post('/post', [PostController::class, 'store'])->name('post-store');
//Route::put('/post/update/{id}',[PostController::class, 'update'])->name('post-update');
Route::post('/post/editar',[PostController::class,'update'])->name('post-editar');

Route::delete('/post/delete/{id}',[PostController::class, 'destroy'])->name('post-delete-id');
//----------------------- End Post-----------------------------------

