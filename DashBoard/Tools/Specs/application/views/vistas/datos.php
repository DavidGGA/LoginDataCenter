<?php $this->load->view('vistas/headers'); ?>
		<a href="http://maiadatacenter.co/logout.php">
			<button class="btn btn-danger" type="button" id="logout" style="float: right;">
				Logout	
			</button>
		</a>
		<a href="http://maiadatacenter.co/DashBoard/Tools/Specs/controlador2/nuevo/" > 
			<button class="btn btn-success" type="button"/>
	  			Crear ID
			</button>
		</a>
		 		<button class="btn btn-info" onclick="mostrarTabla()" type="button"/>
	  			Mostrar
	  			</button>
<!--/////////////////BUSCADOR NUEVO//////////////////-->
<div align="center">
	<div>
		<!--<h2>Buscador múltiples criterios</h2>-->
		<?php $atributos = array('class' => 'formulario') ?>
		<?php echo form_open('buscador',$atributos) ?>

			<!--este es nuestro autocompletado-->
			<input type="text" autocomplete="off" onpaste="return false" name="users" 
			id="users" class="users" placeholder="Buscador de múltiples criterios" />
			
            <div class="muestra_users">
	            <table id="DataTable" class="table table-bordered table-hover table-condensed" border="1">
	 			</table>

            </div>
			
		<?php echo form_close() ?>
		
	</div>	
</div>
<!--/////////////////BUSCADOR NUEVO FIN//////////////////-->




<!--///////////////////////////BUSCADOR ANTERIOR///////////////////////////////////////////-->	
<!--
<form action="<?php echo site_url('controlador2/search_keyword/');?>" method = "post" align="center">
	<input type="text" name = "keyword" size="50px" />
	<input type="submit" value = "Buscar" />
</form>
-->
<!--///////////////////////////BUSCADOR ANTERIOR FIN///////////////////////////////////////-->	


<br>

<form id="myFormu" action="<?php echo site_url('controlador2/exportar/');?>" method ="post" align="center" style="display: none;" >
	<?PHP echo $tabla; ?>
<br>	
	<input type="submit" class="btn btn-primary" value="Exportar" />
</form>
<h4>Seleccionados:</h4>
<table id="stopsTable" class="table table-bordered table-hover"><tbody><tr><th>Mercado</th><th>Sitio</th><th>Banner</th><th>Size</th><th>Formato</th><th>Weight</th><th>ClickTag</th><th>Observaciones</th><th>Editar</th><th>Eliminar</th><th>Eliminar</th></tr></tbody></table>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js'></script>
		<!--<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->

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
function mostrarTabla(){
	var x = document.getElementById('myFormu');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
	} 
////////////////
 var rows = $('#myTable tbody tr'),
        copyTable = $('#stopsTable tbody');
    
           rows.click(function() {
            var row = $(this),
                cloneRow = row.clone();

            cloneRow.children('td:last-child').html('<input type="submit" value="Delete" style="font-size: 12px; width: 100px;" class="delete">');

            copyTable.append(cloneRow);

            //row.prevAll().hide();
        });

        copyTable.on('click', '.delete', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        }) 


</script>
        <script type="text/javascript" src="<?php echo base_url('js/funciones.js?'.time()) ?>"></script>
       <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">-->

</body>
</html>		