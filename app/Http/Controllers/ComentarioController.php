<?php

namespace App\Http\Controllers;

use App\Models\ComentarioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;


class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentarios= ComentarioModel::orderBy('clave_comentario','ASC')->get();
        return view('blog.comentario', compact('comentarios'));
    }

    public function getcomentarios(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('catalogo_comentario as p')
                ->join('catalogo_post as po', 'p.clave_post','=','po.clave_post')
            ->select('p.*', 'po.titulo')
                ->orderBy('p.clave_comentario','ASC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-primary" data-clave="'.$row->clave_comentario.'">Editar</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-transparent" data-toggle="modal" data-target="#modal-preguntar-borrar" data-clave="'.$row->clave_comentario.'">Eliminar</a>';
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
        $comentario                       = new ComentarioModel;
        $current_timestamp                = date ('Y-m-d H:i:s');
        $comentario->comentario           = $request['comentario'];
        $comentario->clave_post           = $request['clave_post'];
        $comentario->correo               = $request['correo'];
        $comentario->correo               = $request['nombre'];
        $comentario->fecha_alta           = $current_timestamp;
        $comentario->save();

        return $comentario;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ComentarioModel  $comentarioModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario=ComentarioModel::findOrFail($id);
        return $comentario;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ComentarioModel  $comentarioModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ComentarioModel $comentarioModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComentarioModel  $comentarioModel
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $current_timestamp              = date ('Y-m-d H:i:s');
        $comentario                      =ComentarioModel::findOrFail($id);
        $comentario->comentario           = $request['comentario'];
        $comentario->clave_post           = $request['clave_post'];
        $comentario->correo               = $request['correo'];

        $comentario->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComentarioModel  $comentarioModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario=ComentarioModel::findOrFail($id);
        $comentario->delete();

    }

    public function email($email, $nombre, $password){
        // Configuration
        $smtpAddress = 'smtp.gmail.com';
        $port = 465;
        $encryption = 'ssl';
        $yourEmail = '';
        $yourPassword = '';

        // Prepare transport
        $transport = (new \Swift_SmtpTransport($smtpAddress,$port,$encryption))
            ->setUsername($yourEmail)
            ->setPassword($yourPassword )
        ;

        $mailer = new \Swift_Mailer($transport);
        // Prepare content
        $view = View::make('email_template', [
            'message' => ' Estimado '.$nombre,
            'message2'=>'',
            'message3'=>'Nombre de usuario :'.$nombre,
            'message4'=>'Nueva Contraseña :'.$password,
            'message5'=>''

        ]);

        $html = $view->render();

        // Send email
        $message = new \Swift_Message('Cambio de Contraseña');
        $message->setFrom([$yourEmail => 'Llantimax'])->setTo([$email => $nombre])->setBody($html, 'text/html');

        if($mailer->send($message)){
            return "Check your inbox";
        }
        return "Something went wrong :(";

    }
}
