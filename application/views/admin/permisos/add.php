
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Permisos
        <small>Nuevo</small>
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


                        <form action="<?php echo base_url();?>administrador/permisos/store" method="POST">

                          <!--FORM NOMBRE-->
                            <div class="form-group <?php echo form_error('nombre') == true ? 'has-error':''?>">
                                <label for="nombre">Roles:</label>
                                <select name="rol" id="rol" class="form-control">
                                  <?php foreach ($roles as $rol):?>
                                    <option value="<?php echo $rol->id;?>"><?php echo $rol->nombre;?>
                                    </opcion>
                                <?php endforeach ?>
                              </select>
                            </div>


                            <div class="form-group <?php echo form_error('nombre') == true ? 'has-error':''?>">
                                <label for="menu">Menus:</label>
                                <select name="menu" id="menu" class="form-control">
                                  <?php foreach ($menus as $menu):?>
                                    <option value="<?php echo $menu->id;?>"><?php echo $menu->nombre;?>
                                    </opcion>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="read">Leer:</label>
                              <label class="radio-inline">
                                <input type="radio" name="read" value="1" checked="checked">Si
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="read" value="0" checked="checked">No
                              </label>
                            </div>

                            <div class="form-group">
                              <label for="read">Agregar:</label>
                              <label class="radio-inline">
                                <input type="radio" name="insert" value="1" checked="checked">Si
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="insert" value="0" checked="checked">No
                              </label>
                            </div>

                            <div class="form-group">
                              <label for="read">Leer:</label>
                              <label class="radio-inline">
                                <input type="radio" name="update" value="1" checked="checked">Si
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="update" value="0" checked="checked">No
                              </label>
                            </div>

                            <div class="form-group">
                              <label for="read">Leer:</label>
                              <label class="radio-inline">
                                <input type="radio" name="delete" value="1" checked="checked">Si
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="delete" value="0" checked="checked">No
                              </label>
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
