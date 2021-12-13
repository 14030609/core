@extends('components.modal_body')

@section('modal_id', 'modal-categoria')

@section('modal_titulo', 'Agregar categoria')

@section('modal_contenido')
    <form role="form" >
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Nombre de la nueva categoría" >
        </div>
    </form>
@endsection

@section('modal_botones')
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
    <button type="button" id="guardar-categoria" value="create" class="btn btn-primary">Agregar Categoría</button>
    <button type="button" id="editar_categoria" value="create" class="btn btn-primary">Editar</button>

@endsection


@section('modal_js')
    <script>


    </script>
@endsection
