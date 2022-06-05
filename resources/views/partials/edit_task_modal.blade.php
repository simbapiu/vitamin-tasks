<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar cuestionario</h5>
            </div>
            <form method="post" action="/admin/quizzes">
                @csrf
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
                    <input type="hidden" name="id" id="idEdit">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descripción</label>
                        <textarea class="form-control" required name="description" id="editDescription" placeholder="Ingresa una breve descripción.">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Periodo:</label>
                        <input type="text" name="period" required class="form-control" id="editPeriod" placeholder="Ingrese un año. Ej. 2020" value="{{ old('period') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>