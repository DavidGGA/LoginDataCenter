<center>
	<p>
		<a href="http://maiadatacenter.co/specs/controlador2/mostrar_datos/">
		    	<button type="button" border="15">
		    		<h3>Volver</h3>
		    	</button>    	
	    	</a>
	</p>
	
</center>	
<!---->
<form action="<?php echo site_url('controlador2/exportar/');?>" method ="post" align="center" >




 	<table style="width:100%" border="6px">	
		<tr>
			<th>Id Usuario</th>
			<th>Mercado</th>
			<th>Sitio</th> 
			<th>Banner</th>
			<th>Size<br>(width/large)</th>
			<th>Formato</th> 
			<th>Weight</th> 
			<th>ClickTag</th>
			<th>Observaciones</th>
			<!--<th>Email</th>-->
			<th>Acción</th>
			<th>Generar Reporte<br><input type="checkbox" id="checktodos1" /></th>
		</tr>
<?php 
//print_r ($results);

foreach($results as $row){ ?>
	    <tr>
	        <td><?php echo $row->id_user; ?></td>
	        <td><?php echo $row->Mercado; ?></td>
	        <td><?php echo $row->Sitio; ?></td>
	        <td><?php echo $row->Banner; ?></td>
	        <td><?php echo $row->Size; ?></td>
	        <td><?php echo $row->Formato; ?></td>
	        <td><?php echo $row->Weight; ?></td>
	        <td><?php echo $row->ClickTag; ?></td>
	        <td><a href="'<?php echo $row->Observaciones; ?>'"><center>Clic aqui</center></a></td>
	        <!--<td><?php echo $row->Observaciones; ?></td>-->
	        <!--<td><?php echo $row->EmailAddress; ?></td>-->
	        <td><center><a href="<?php echo base_url() .'controlador2/editar/'.$row->id_user; ?>">Actualizar</a>//////////////////////////////
			<a href="<?php echo base_url().'controlador2/eleccion/'.$row->id_user; ?>">Eliminar</a></center>
			</td>
			<td><center><input type="checkbox" class="hola" name=<?php echo 'export'.$row->id_user;?> value=<?php echo $row->id_user;?> ></center></td>
	    </tr>  
<?php } ?>
	</table><br>
<center>

<br><br><br>	
	<input type="submit" value="exportar" />
</center>	
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script type="text/javascript">	
	$('document').ready(function(){
		//alert("hola");
   $("#checktodos1").change(function () {

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
