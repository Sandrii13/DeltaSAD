<div class="modal fade" id="nueva">
    <div class="modal-dialog">
        <div class="modal-content content-box">
            <div class="modal-header">
                <h4>Nueva Trabajadora</h4>
            </div>
            <form action="{{route('trabajadoras.store')}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12 col-md-6">
                            <p class="first-text">Nombre: <span><input name="nombre" type="text" value="{{old('nombre')}}" class="content-text" pattern="[a-zA-Z]{1,15}" required></span></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Apellidos: <span><input name="apellidos" type="text" value="{{old('apellidos')}}" class="content-text" pattern="[a-zA-Z]{1,15}" required></span></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">DNI/NIF: <span><input name="dni" type="text" value="{{old('dni')}}" class="content-text" pattern="{8}[a-zA-Z]" required></span></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Teléfono: <span><input name="telefono" type="number" value="{{old('telefono')}}" class="content-text"  minlength="9" required></span></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Email: <span><input name="email" type="email" value="{{old('email')}}" class="content-text" required></span></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="first-text">Password: <span><input name="password" type="text" value="{{old('password')}}" class="content-text"  minlength="8" required></span></p>
                        </div>
                        <div class="col-12">
                            <p class="first-text">Zona:
                                <span>
                                    <select class="content-text" title="Porfavor, selecciona una zona" name="zona" required>
                                        <option value="1">Zona I (Clot)</option>
                                        <option value="2">Zona II (Sant Martí)</option>
                                        <option value="3">Zona III (Sagrada Familia)</option>
                                    </select>
                                </span>
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="first-text">Rol:
                                <span>
                                    <select class="content-text" title="Porfavor, selecciona un rol" name="rol_id" required>
                                        <option value="1">Coordinadora</option>
                                        <option value="2">Trabajadora Familiar</option>
                                        <option value="3">Trabajadora social</option>
                                    </select>
                                </span>
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="first-text">Foto de perfil:
                                <span>
                                    <input type="file" name="img" accept="image/*" class="content-text" lang="es">
                                </span>
                            </p>
                        </div>
                        <div class="col-12">
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row all-content d-flex justify-content-end">
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-general">Añadir</button>
                                            </div>
                                            <div class="col-6">
                                                <button data-dismiss='modal' type="button" class="btn btn-general bg-danger">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
