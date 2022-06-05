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
                        <td>Example</td>
                        <td>Name example</td>
                        <td>Category example</td>
                        <td><input type="checkbox" id="updateStatus"><span id="taskStatus" style="padding-left: 20px;">No Realizada<span></td>
                        <td class="btn-actions-container">
                            <div class="btn-actions">
                                <a href="?id=<?php echo ""; ?>"><i class="fas fa-pen fa-sm link-warning" style="padding-right: 20px;"></i></a>
                                <a href="scripts/eliminar_encuesta.php?id=<?php echo "" ?>"><i class="fas fa-trash fa-sm link-danger"></i></a>
                            </div>
                            <form action="#" method="post" id="formDel">
                                <input type="hidden" name="id" value="">
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>