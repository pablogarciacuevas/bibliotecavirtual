<!--Mensaje de alerta o registro-->
<?php if(isset($_SESSION["register"]) && $_SESSION["register"] == 'complete'):?>
    <div class='alert alert-success alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Exitosa!</strong> <?= $_SESSION["mensaje"] ?>  </div>
<?php elseif(isset($_SESSION["register"]) && $_SESSION["register"] == 'failed'): ?>
    <div class='alert alert-warning alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Error!</strong> <?= $_SESSION["mensaje"] ?> </div>
<?php endif; ?>


<!-- Panel nuevo libro -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO LIBRO</h3>
        </div>
        <div class="panel-body">
            <form action="<?=base_url?>Libro/save" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Código de libro *</label>
                                    <input pattern="[a-zA-Z0-9-]{1,30}" class="form-control" value="<?=$libro->getCodigo();?>" type="text" name="codigo"  maxlength="30">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'codigo') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Título *</label>
                                    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" value="<?=$libro->getTitulo();?>" type="text" name="titulo"  maxlength="30">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'titulo') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Autor *</label>
                                    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" value="<?=$libro->getAutor();?>" type="text" name="autor"  maxlength="30">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'autor') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">País</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" value="<?=$libro->getPais();?>" type="text" name="pais" maxlength="30">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'pais') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Año</label>
                                    <input pattern="[0-9]{1,4}" class="form-control" type="text" value="<?=$libro->getAnio();?>" name="year" maxlength="4">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'anio') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Editorial</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" value="<?=$libro->getEditorial();?>" type="text" name="editorial" maxlength="30">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'editorial') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Edición</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" value="<?=$libro->getEdicion();?>" name="edicion" maxlength="30">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'edicion') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend><i class="zmdi zmdi-labels"></i> &nbsp; Empresa, Categoría y Proveedor</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Empresa</label>
                                    <select name="empresa" class="form-control">
                                        <option value="0"> ---SELECCIONE--- </option>
                                        <?php if($empresas->num_rows > 0): ?>
                                            <?php while($empresa = $empresas->fetch_object()): ?>
                                                <option value="<?=$empresa->id?>" <?php if($libro -> getEmpresa() == $empresa->id) echo"selected"; ?> ><?=$empresa->nombre?></option>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Categoría</label>
                                    <select name="categoria" class="form-control">
                                        <option value="0"> ---SELECCIONE--- </option>
                                        <?php if($categorias->num_rows > 0): ?>
                                            <?php while($categoria = $categorias->fetch_object()): ?>
                                                <option value="<?=$categoria->id?>" <?php if($libro -> getCategoria() == $categoria->id) echo"selected"; ?>><?=$categoria->nombre?></option>
                                            <?php endwhile; ?>
                                        <?php endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Proveedor</label>
                                    <select name="proveedor" class="form-control">
                                        <option value="0"> ---SELECCIONE--- </option>
                                        <?php if($proveedores->num_rows > 0): ?>
                                            <?php while($proveedor = $proveedores->fetch_object()): ?>
                                                <option value="<?=$proveedor->id?>"  <?php if($libro -> getProveedor() == $proveedor->id) echo"selected"; ?>><?=$proveedor->nombre?></option>
                                            <?php endwhile;?>    
                                        <?php endif;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend><i class="zmdi zmdi-money-box"></i> &nbsp; Precio, Ejemplares y Ubicación</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Precio</label>
                                    <input pattern="[0-9.]{1,7}" class="form-control" value="<?=$libro->getPrecio();?>" type="text" name="precio" maxlength="7">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'precio') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ejemplares</label>
                                    <input pattern="[0-9]{1,3}" class="form-control" value="<?=$libro->getEjemplares();?>" type="text" name="ejemplares" maxlength="3">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'ejemplares') ?>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ubicación</label>
                                    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" value="<?=$libro->getUbicacion();?>" type="text" name="ubicacion" maxlength="30">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'ubicacion') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Resumen del libro</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Resumen</label>
                                    <textarea name="resumen" class="form-control"  rows="3"><?=$libro->getResumen();?></textarea>
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'resumen') ?>                                                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend><i class="zmdi zmdi-attachment-alt"></i> &nbsp; Imágen y archivo PDF</legend>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <span class="control-label">Imágen</span>
                            <!-- <input type="image" name="imagen" accept=".jpg, .png, .jpeg"> -->
                            <input type="file" id="imagen" name="imagen" accept="image/png, image/jpg, image/jpeg">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control" placeholder="Elija la imágen...">
                                <span class="input-group-btn input-group-sm">
                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="zmdi zmdi-attachment-alt"></i>
                                    </button>
                                </span>
                            </div>
                            <span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <span class="control-label">PDF</span>
                            <input type="file" name="pdf" accept=".pdf">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
                                <span class="input-group-btn input-group-sm">
                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="zmdi zmdi-attachment-alt"></i>
                                    </button>
                                </span>
                            </div>
                            <span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos: documentos PDF</small></span>
                        </div>                    
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label class="control-label">¿El archivo PDF será descargable para los clientes?</label>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="descargable" id="optionsRadios1" value="1" <?php if($libro->getDescargable() == 1) echo "checked";?>> 
                                    <i class="zmdi zmdi-cloud-download"></i> &nbsp; Si, PDF descargable
                                </label>                                                                
                            </div>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="descargable" id="optionsRadios2" value="0" <?php if($libro->getDescargable() == 0) echo "checked";?>>
                                    <i class="zmdi zmdi-cloud-off"></i> &nbsp; No, PDF no descargable
                                </label>                            
                            </div>
                        </div>
                    </div>
                </fieldset>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                </p>
            </form>
        </div>
    </div>
</div>
<?php Utils::borrarErrores(); ?>