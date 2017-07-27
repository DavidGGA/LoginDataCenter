<?php $this->load->view('vistas/headers'); ?>

<br><br><br>
<center>
	<p>
		<a href="http://maiadatacenter.co/specs/controlador2/nuevo/" > 
			<button type="button" border="15" />
	  			<h3>Crear ID</h3>
			</button>
		</a>
	</p>
</center>	
<br>
<br>
<br>
<!--/////////////////BUSCADOR NUEVO//////////////////-->
<div align="center">
	<div>
		<h2>Buscador múltiples criterios</h2>
		<?php $atributos = array('class' => 'formulario') ?>
		<?php echo form_open('buscador',$atributos) ?>

			<!--este es nuestro autocompletado-->
			<input type="text" autocomplete="off" onpaste="return false" name="users" 
			id="users" class="users" placeholder="Buscar" />
			
            <div class="muestra_users"></div>
			
		<?php echo form_close() ?>
		
	</div>	
</div>
<!--/////////////////BUSCADOR NUEVO FIN//////////////////-->
<br>
<br>
<br>
<!--///////////////////////////BUSCADOR ANTERIOR///////////////////////////////////////////-->	
<form action="<?php echo site_url('controlador2/search_keyword/');?>" method = "post" align="center">
	<input type="text" name = "keyword" size="50px" />
	<input type="submit" value = "Buscar" />
</form>
<!--///////////////////////////BUSCADOR ANTERIOR FIN///////////////////////////////////////-->	
	<p>
		<a href="http://maiadatacenter.co/specs/login/logout/" align="">
  			<div align="right">
  				Cerrar Sesion
			</div>
		</a>
	</p>	
<br>
<form action="<?php echo site_url('controlador2/exportar/');?>" method ="post" align="center" >
	<?PHP echo $tabla; ?>
<br><br><br>	
	<input type="submit" value="exportar" />
</form>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js'></script>
		<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script type="text/javascript">	
	$(window).load(function(){

		//alert("hola");

		//window.setTimeout($('#myTable').DataTable(), 5000);


   $("#checktodos").change(function () {

   	if($(this).parent().find('input').is(':checked')) {
    //something();
    $( ".hola" ).prop( "checked", true );
	}else {
		$( ".hola" ).prop( "checked", false );
	}

   		//$( ".hola" ).prop( "checked", true );
      //$("#checktodos").prop('checked', $(this).prop("checked"));
  });
});
 

</script>
        <script type="text/javascript" src="<?php echo base_url('js/funciones.js?'.time()) ?>"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

</body>
</html>		