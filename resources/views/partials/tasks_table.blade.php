<!-- data tables -->
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Listado de tareas
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th scope="col"># tarea</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->category }}</td>
                            <td><input type="checkbox" id="updateStatus"><span id="taskStatus" style="padding-left: 20px;">{{ $task->status }}<span></td>
                            <td class="btn-actions-container">
                                <div class="btn-actions">
                                    <button class="btn btn-round btnEdit"
                                            data-id="{{ $task->id }}"
                                            data-name="{{ $task->name }}"
                                            data-category="{{ $task->category }}"
                                            data-bs-toggle="modal" data-bs-target="#modalEditar">
                                        <i class="fas fa-pen fa-sm link-warning"></i>
                                    </button>
                                    <button class="btn btn-round btnDelete" data-id="{{ $task->id }}" data-bs-toggle="modal" data-bs-target="#modalEliminar">
                                        <i class="fas fa-trash fa-sm link-danger"></i>
                                    </button>
                                    <form action="{{ url('/tasks/', ['id' => $task->id]) }}" method="post" id="formDel_{{ $task->id }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $task->id }}">
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>