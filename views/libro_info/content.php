<!-- Panel info libro -->
<div class="container-fluid">
<div class="panel panel-info">
<div class="panel-heading">
    <h3 class="panel-title"><i class="zmdi zmdi-info"></i> &nbsp; NOMBRE LIBRO</h3>
</div>
<div class="panel-body">
    <fieldset>
        <legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica</legend>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group label-floating">
                        <span>Título</span>
                        <input class="form-control" value="<?=$libro->titulo?>"readonly="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    
                    <?php var_dump($libro)?>         
                    <img src="<?=base_url?>uploads/imagenes/<?=$libro->url_imagen?>"  class="img-responsive">

                    
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <span>Autor</span>
                                    <input class="form-control" value="<?=$libro->autor?>"readonly="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <span>País</span>
                                    <input class="form-control" value="<?=$libro->pais?>" readonly="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <span>Año</span>
                                    <input class="form-control" value="<?=$libro->anio?>"readonly="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <span>Editorial</span>
                                    <input class="form-control" value="<?=$libro->editorial?>" readonly="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <span>Edición</span>
                                    <input class="form-control" value="<?=$libro->edicion?>" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>