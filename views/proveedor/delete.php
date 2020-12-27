<!-- Panel eliminar -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-delete"></i> &nbsp; <?=$title?> </h3>
                </div>
                <div class="panel-body">
                    <p class="lead">
                        ¿Esta seguro de eliminar el registro?
                    </p>
                    <p class="text-center">
                        <a href="<?=base_url?>proveedor/delete&id=<?=$id?>" class="btn btn-raised btn-danger">
                            <i class="zmdi zmdi-delete"></i> &nbsp; ELIMINAR REGISTRO
                        </a>	
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>