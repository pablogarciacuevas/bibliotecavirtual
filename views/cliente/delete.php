
<!-- Panel eliminar -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-<?=$action == 'ELIMINAR' ?  'delete' : 'block-alt' ?>"></i> &nbsp; <?=$title?> </h3>
                </div>
                <div class="panel-body">
                    <p class="lead">
                        ¿Esta seguro de <?=$action?> el registro?
                    </p>
                    <p class="text-center">
                        <a href="<?=base_url?>cliente/<?=$action == 'ELIMINAR' ?  'delete' : 'canceling' ?>&id=<?=$id?>" class="btn btn-raised btn-danger">
                            <i class="zmdi zmdi-<?=$action == 'ELIMINAR' ?  'delete' : 'block-alt' ?>"></i> &nbsp; <?=$action?> REGISTRO
                        </a>	
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
