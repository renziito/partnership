<?php
$this->breadcrumbs = array(
    'Perfil'
);
?>

<style>
    .checkbox input[type=checkbox]:checked + label::after {
        font-family: 'Font Awesome 5 Free';
        content: "\F00C";
        font-weight: 900;
        color: #fff;
    }
</style>
<div class=" container-fluid   container-fixed-lg bg-white">
    <div class="row">
        <div class="col-md-12">
            <h1>Perfil</h1>
            <div class="card card-transparent">
                <div class="card-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger" role="alert">
                            <button class="close" data-dismiss="alert"></button>
                            <strong>ERROR: </strong><?= $error ?>
                        </div>
                    <?php endif; ?>
                    <form id="form-project" role="form" autocomplete="off" method="POST">
                        <div class="form-group-attached">
                            <div class="form-group form-group-default required">
                                <label>Nombres</label>
                                <input type="text" class="form-control" name="Usuario[nombres]" required=""
                                       value="<?= $user->nombres ?>">
                            </div>
                            <div class="form-group form-group-default required">
                                <label>Apellidos</label>
                                <input type="text" class="form-control" name="Usuario[apellidos]" required=""
                                       value="<?= $user->apellidos ?>">
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Correo</label>
                                        <input type="text" class="form-control" name="Usuario[correo]" required=""
                                               value="<?= $user->correo ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>DNI</label>
                                        <input type="text" class="form-control" name="Usuario[dni]"
                                               value="<?= $user->dni ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group-attached">
                            <p>Por seguridad escriba su clave actual</p>
                            <div class="form-group form-group-default required">
                                <label>Contraseña Actual</label>
                                <input type="password" class="form-control" name="Usuario[contrasena]" required="">
                            </div>
                            <br>
                            <p>Cambio de Clave<small> (Para cambio de clave llenar los siguientes campos)</small></p>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Nueva Clave</label>
                                        <input type="password" class="form-control" name="Usuario[nclave]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Repetir Nueva Clave</label>
                                        <input type="password" class="form-control" name="Usuario[nclavedos]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success pull-right m-t-40" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>