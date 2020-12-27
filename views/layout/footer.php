</section>

<!--====== Scripts -->
<script src="<?=base_url?>/js/jquery-3.1.1.min.js"></script>
<script src="<?=base_url?>/js/sweetalert2.min.js"></script>
<script src="<?=base_url?>/js/bootstrap.min.js"></script>
<script src="<?=base_url?>/js/material.min.js"></script>
<script src="<?=base_url?>/js/ripples.min.js"></script>
<script src="<?=base_url?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?=base_url?>/js/main.js"></script>
<script>
    $.material.init();
</script>
<script type='text/javascript'>
	$('.btn-exit-system').on('click', function(e){
		e.preventDefault();
		swal({
		  	title: 'Esta seguro?',
		  	text: "La session esta apunto de cerrarse",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-run"></i> Yes, Salir!',
		  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
		}).then(function () {
			window.location.href="<?=base_url?>usuario/login";
		});
    });
</script>
</body>
</html>