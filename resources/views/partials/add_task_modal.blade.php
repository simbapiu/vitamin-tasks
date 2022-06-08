<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tarea</h5>
            </div>
            <form id = "formData">
                <div class="modal-body">
                    @if($message = Session::get('ErrorInsert'))
                        <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                            <h5>Errores:</h5>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($message = Session::get('ErrorInsertPeriod'))
                        <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                            <h5>Errores:</h5>
                            <ul>
                                {{ $message }}
                            </ul>
                        </div>
                    @endif
                    <input type="hidden" id="modalId" name="modalId" value="">
                    <input type="hidden" id="taskId" name="taskId" value="">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Nombre:</label>
                        <input type="text" name="name" required class="form-control" id="createName" placeholder="Ingrese el nombre de la tarea">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="col-form-label">Categoría:</label>
                        <input type="text" name="category" required class="form-control" id="createCategory" placeholder="Ingresa la categoria">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="submit">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
