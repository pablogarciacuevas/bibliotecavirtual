<div class="container-fluid">
    <form class="well">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="form-group label-floating">
                    <span class="control-label">¿Qué libro estas buscando?</span>
                    <input class="form-control" type="text" name="search_book_init" required="">
                </div>
            </div>
            <div class="col-xs-12">
                <p class="text-center">
                    <button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-search"></i> &nbsp; Buscar</button>
                </p>
            </div>
        </div>
    </form>
</div>

<div class="container-fluid">
    <form class="well">
        <p class="lead text-center">Su última búsqueda fue <strong>“Busqueda”</strong></p>
        <div class="row">
            <input class="form-control" type="hidden" name="search_book_destroy">
            <div class="col-xs-12">
                <p class="text-center">
                    <button type="submit" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-delete"></i> &nbsp; Eliminar búsqueda</button>
                </p>
            </div>
        </div>
    </form>
</div>