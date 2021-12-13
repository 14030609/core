@extends('components.modal_body')

@section('modal_id', 'modal-post')

@section('modal_titulo', 'Agregar Post')

@section('modal_contenido')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <form role="form"  >
        <div class="contenedor-col-2">
            <div>
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="titulo" >
            </div>
            <div >
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion" >
            </div>
        </div>
        <div class="contenedor-col-2">
            <div class="form-group">
                <label class="form-label" for="selectCategoria">Categorias</label>
                <select id="selectCategoria" class="form-control form-white">
                    <option value="0" selected disabled></option>
                    @foreach( $categorias as  $p )
                        <option value="{{$p->clave_categoria}}">{{$p->categoria}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea class="form-control"  name="contenido" id="contenido"  placeholder="contenido" ></textarea>
        </div>


        <div class="form-group">
            <label for="formFile" class="form-label">Imagen</label>
            <input class="form-control" type="file" id="exampleInputFile">
        </div>



{{--        <div class="card-body">--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleInputEmail1">Email address</label>--}}
{{--                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleInputPassword1">Password</label>--}}
{{--                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleInputFile">File input</label>--}}
{{--                <div class="input-group">--}}
{{--                    <div class="custom-file">--}}
{{--                        <input type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
{{--                    </div>--}}
{{--                    <div class="input-group-append">--}}
{{--                        <span class="input-group-text">Upload</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="form-check">--}}
{{--                <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- /.card-body -->
    <!-- /.card -->


    </form>
    <style>
        textarea{
            overflow:hidden;
            margin:50px auto;
            display:block;
        }
    </style>

@endsection

@section('modal_botones')
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
    <button type="button" id="guardar-post" value="create" class="btn btn-primary">Agregar Post</button>
    <button type="button" id="editar_post" value="create"  class="btn btn-primary"  >Editar</button>

@endsection


@section('modal_js')
    <script>

        var textarea = document.querySelector('textarea');

        textarea.addEventListener('keydown', autosize);

        function autosize(){
            var el = this;
            setTimeout(function(){
                el.style.cssText = 'height:auto; padding:0';
                el.style.cssText = 'height:' + el.scrollHeight + 'px';
            },0);
        }
    </script>
@endsection
