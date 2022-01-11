<?php


if (session('activo')==0)
{
    print_r("No estas logueado, por favor inicia sesion");

    return redirect('/singin');
    die();
}
?>

    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Posts</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Datatables-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
<div class="wrapper">

  <!-- Preloader -->
{{--  <div class="preloader flex-column justify-content-center align-items-center">--}}
{{--    <img class="animation__shake" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">--}}
{{--  </div>--}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="post" class="nav-link">Posts</a>
      </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="categoria" class="nav-link">Categorias</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="comentario" class="nav-link">Comentarios</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">

        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="\" class="brand-link">
      <img src="\images\LOGOTIPO- PNG-AZUL-CORE.png" alt="Logo" class="brand-image profile-user-img" style="opacity: .8; max-height: 50px">
        <br>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="post" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="categoria" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="comentario" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comentarios</p>
                </a>
              </li>
                <li class="nav-item">
                    <a href="logout" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Cerrar sesion</p>
                    </a>
                </li>

            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

          <div class="m-b-20">
              <div class="btn-group">
                  <button id="table-edit_new" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-post"><i class="fa fa-plus"></i> Agregar post</button>
              </div>
          </div>

          <table class="table table-bordered yajra-datatable" id="tablaPost">
              <thead>
              <tr>
                  <th>Titulo</th>
                  <th>Descripcion</th>
                  <th>Categoria</th>
                  <th>Fecha Alta</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
              </tbody>
          </table>

          @include('modals.post')

          <div class="modal fade" id="modal-preguntar-borrar" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content bg-orange">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                          <h4 class="modal-title" id="modal-mostrar-success-titulo">Advertencia</h4>
                      </div>
                      <div class="modal-body">
                          <div class="text-center big-icon">
                              <i class="fa fa-warning" style="font-size:70px;margin-bottom:50px;"></i>
                          </div>
                          <div id="modal-mostrar-success-cuerpo" style="font-size:20px;text-align:center;font-weight:600;">
                              ¿Estás seguro de eliminar el registro?
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn bg-orange" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-dark" data-dismiss="modal" id="boton-preguntar-borrar">Aceptar</button>
                      </div>
                  </div>
              </div>
          </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">IdentidadFilms</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

</div>
<!-- ./wrapper -->
</body>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>

<!-- Datatables -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>

<script>
    $(function () {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('post.list') }}",
            columns: [
                {data: 'titulo', name: 'titulo'},
                {data: 'descripcion', name: 'descripcion'},
                {data: 'categoria', name: 'categoria'},
                {data: 'fecha_alta', name: 'fecha_alta'},

                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

    });

    //---------------------EDITAR sucursal--------------------------
    // $(document).on("click", ".edit", function()
    // {
    //     limpiarModal();
    //
    //     bandera_editar = true;
    //     clave_post = $(this).data('clave');
    //
    //     console.log(bandera_editar);
    //
    //     $('#modal-post').find('.modal-title strong').html('Editar post');
    //     $('#guardar-post').hide();
    //     $('#editar-post').show();
    //
    //     cargarDatos(clave_post);
    // });

    async function cargarDatos(clave_post){
        let url = "{{route('post-show-edit','id')}}";
        url = url.replace('id', clave_post);

        await $.ajax({
            url:url,
            method: 'get',
            success: function (respuesta){

                console.log(respuesta);
                $('#modal-post').modal('show');

                let titulo = respuesta.titulo;
                let descripcion      = respuesta.descripcion;
                let contenido      = respuesta.contenido;

                $('#titulo').val(titulo);
                $('#descripcion').val(descripcion);
                $('#contenido').val(contenido);

            },
            error: function (error){
                console.log(error);
            }
        });
    }


    // function limpiarModal(){
    //     bandera_editar = false;
    //     $('#modal-sucursal').find('.modal-title strong').html('Agregar post');
    //     $('#titulo').val('');
    //     $('#descripcion').val('');
    //     $('#contenido').val('');
    //     $('#guardar-post').prop('disabled',false);
    // }



    $('#guardar-post').click(function(e)
    {
        e.stopPropagation();
        e.preventDefault();
        var titulo = document.getElementById("titulo").value;
        var descripcion = document.getElementById("descripcion").value;
        var categoria = document.getElementById("selectCategoria").value;
        var contenido = document.getElementById("contenido").value;
        var imagen = document.getElementById("exampleInputFile").files[0];
        var formData = new FormData();

        formData.append("clave_categoria", categoria);
        formData.append("contenido", contenido);
        formData.append("descripcion", descripcion);
        formData.append("imagen", imagen);
        formData.append("titulo", titulo);


        //let categoria = $('#categoria').val();
        $.ajax({
            type:"POST",
            url:"{{ route('post-store') }}",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            cache: false,
            success:function(datos)
            {
                console.log(datos)
//                $('#modal-categoria').modal('toggle');

                alert("Se ha registrado correctamente el post");
                $('#tablaPost').DataTable().ajax.reload();

            },
            error: function(e)
            {
                console.log(e);
                alert("Hubo un error, porfavor repórtalo");

            }
        });
    });
    let clave_edit=0;
    $(document).on('click', '.edit', function (e) {
        $("#editar_post").show();
        $('#guardar-post').hide()
        $('#modal-post').modal('show');

        clave_edit = $(this).data('clave');
    });
    $('#editar_post').click(function(e)
    {
        e.stopPropagation();
        e.preventDefault();
        var titulo = document.getElementById("titulo").value;
        var descripcion = document.getElementById("descripcion").value;
        var categoria = document.getElementById("selectCategoria").value;
        var contenido = document.getElementById("contenido").value;
        var imagen = document.getElementById("exampleInputFile").files[0];
        var formData = new FormData();

        formData.append("clave_categoria", categoria);
        formData.append("contenido", contenido);
        formData.append("descripcion", descripcion);
        formData.append("imagen", imagen);
        formData.append("titulo", titulo);
        formData.append("clave_post", clave_edit);



        //let categoria = $('#categoria').val();
        $.ajax({
            type:"POST",
            url:"{{ route('post-editar') }}",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            cache: false,
            success:function(datos)
            {
                console.log(datos)
//                $('#modal-categoria').modal('toggle');

                alert("Se ha registrado correctamente el post");
                $('#tablaPost').DataTable().ajax.reload();

            },
            error: function(e)
            {
                console.log(e);
                alert("Hubo un error, porfavor repórtalo");

            }
        });
    });


    $(document).on('click', '#table-edit_new', function (e) {
        $('#categoria').val('');
        $("#guardar-post").show();
        $("#editar_post").hide();

        bandera_editar = false;
    });





    $(document).on('click', '.delete', function (e) {
        clave_edit = $(this).data('clave');
    });
    $('#boton-preguntar-borrar').click(function (e) {
        e.preventDefault();
        let url = "{{ route('post-delete-id',':id') }}";
        url = url.replace(':id', clave_edit);
        $.ajax({
            url: url,
            type: 'delete',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function (data) {
                $('#modal-preguntar-borrar').modal('toggle');
                $('#tablaPost').DataTable().ajax.reload();
                alert(
                    'se elimino correctamente el registro'
                )
            },
            error: function (e) {
                //alert('error '+e);
                console.log(e);
                alert("Hubo un error, porfavor reportalo");
            }
        });
    });


</script>



</html>
