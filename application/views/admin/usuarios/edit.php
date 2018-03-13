
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                      <!--VALIDACION INICIO DE SESION-->
                        <?php if($this->session->flashdata("error")):?>

                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                             </div>
                        <?php endif;?>
                        <!--FIN VALIDACION INICIO DE SESION-->


                        <form action="<?php echo base_url();?>administrador/usuarios/update" method="POST">

                          <input type="hidden" name="idusuario" value="<?php echo $usuario->id?>">

                          <!--FORM NOMBRE-->
                            <div class="form-group <?php echo form_error('nombres') == true ? 'has-error':''?>">
                                <label for="nombres">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $usuario->nombres ?>">
                                <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error('apellidos') == true ? 'has-error':''?>">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario->apellidos ?>">
                                <?php echo form_error("apellidos","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error('telefono') == true ? 'has-error':''?>">
                                <label for="telefono">Telefono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usuario->telefono ?>">
                                <?php echo form_error("telefono","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error('email') == true ? 'has-error':''?>">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@ejemplo.com" value="<?php echo $usuario->email ?>">
                                <?php echo form_error("email","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error('username') == true ? 'has-error':''?>">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $usuario->username ?>">
                                <?php echo form_error("username","<span class='help-block'>","</span>");?>
                            </div>
                            <!--
                            <div class="form-group <?php// echo form_error('password') == true ? 'has-error':''?>">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php //echo $usuario->password ?>">
                                <?php //echo form_error("password","<span class='help-block'>","</span>");?>
                            </div>-->

                            <div class="form-group <?php echo form_error("tipousuario") != false ? 'has-error':'';?>">
                                <label for="tipousuario">Tipo de usuario</label>
                                <select name="tipousuario" id="tipousuario" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($roles as $rol) :?>
                                        <option value="<?php echo $rol->id;?>"
                                          <?php echo $rol->id == $usuario->rol_id ? "selected" : "";?>>


                                        <?php echo $rol->nombre ?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php echo form_error("tipocliente","<span class='help-block'>","</span>");?>
                            </div>

                            <!--BOTON-->
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
