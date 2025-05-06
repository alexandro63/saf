<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header no-bd bg-primary">
            <h3 class="modal-title">
                <span class="fw-mediumbold">
                    Nueva
                </span>
                <span class="fw-light">
                    Materia
                </span>
            </h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="small">
                Llena todos los campos con (*) para crear un nuevo registro.
            </p>

            <form action="{{ route('subjects.store') }}" method="POST" id="add_subject">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default required">
                            <label for="per_id">Nombre de Carrera</label>
                            <select class="form-control" name="per_id" id="per_id" style="width: 100%">
                                <option value="" disabled>Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 pr-0 ">
                        <div class="form-group form-group-default required">
                            <label>Nombre de Materia</label>
                            <input name="user_name" type="text" class="form-control" placeholder="Ingrese materia">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label for="">Descripción de Materia</label>
                            <textarea name="" id="" cols="30" rows="10" placeholder="Ingrese descripción"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer no-bd mt-3">
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
