<!-- Content page -->
<div class="container-fluid">
  <div class="page-header">
    <h1 class="text-titles"><i class="zmdi zmdi-book-image zmdi-hc-fw"></i> CATALOGO</h1>
  </div>
  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
</div>
<div class="container-fluid text-center">
  <div class="btn-group"> 
    <a href="javascript:void(0)" class="btn btn-default btn-raised">SELECCIONE UNA CATEORÍA</a>
    <a href="javascript:void(0)" data-target="dropdown-menu" class="btn btn-default btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="<?=base_url?>catalogo/index">Todas</a></li>
    <?php while($categorias = $categoria->fetch_object()): ?>  
        <li><a href="<?=base_url?>catalogo/index&id=<?=$categorias->id?>"><?=$categorias->nombre?></a></li>
    <?php endwhile; ?>

       <!--  <li><a href="#!">Categoría 2</a></li>
        <li><a href="#!">Categoría 3</a></li>
        <li><a href="#!">Categoría 4</a></li>
        <li><a href="#!">Categoría 5</a></li>
        <li><a href="#!">Categoría 6</a></li>
        <li><a href="#!">Categoría 7</a></li> -->
      </ul>
    </div>
</div>