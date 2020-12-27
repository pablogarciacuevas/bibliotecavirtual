
<div class="container-fluid">
    <p class="lead text-center">Su última búsqueda  fue <strong><?=$search?></strong></p>
    <div class="row">
        <input class="form-control" type="hidden" name="search_admin_destroy">
        <div class="col-xs-12">
            <p class="text-center">
                <a href="<?=base_url?>usuario/search" class="btn btn-danger btn-raised btn-sm">
                    <i class="zmdi zmdi-delete"></i> &nbsp; Eliminar búsqueda
                </a>
            </p>
        </div>
    </div>
</div>