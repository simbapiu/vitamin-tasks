<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar cuestionario</h5>
            </div>
            <div class="modal-body">
                @if($message = Session::get('ErrorDelete'))
                    <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                        <h5>Errores:</h5>
                        <ul>
                            {{ $message }}
                        </ul>
                    </div>
                @endif
                <h5>¿Esta seguro de que desea eliminar el cuestionario?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger btnModalEliminar">Eliminar</button>
            </div>
        </div>
    </div>
</div>
