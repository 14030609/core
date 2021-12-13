<div class="modal fade" id="@yield('modal_id')" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            </div>
            <div class="modal-body">
                <div class="modal-body-content">
                    <h4 class="modal-title"><strong><i class="icon-Logo_Scale"></i> @yield('modal_titulo')</strong></h4>
                    @section('modal_contenido')
                    @show
                </div>
            </div>
            <div class="modal-footer">
                @section('modal_botones')
                @show
            </div>
        </div>
    </div>
</div>

<style>
    .contenedor-col-2{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
        align-items: end;
    }
</style>

@section('modal_js')
@show
