<?php $this->load->view('vistas/headers') ?>


<?php echo "<p>!!Esta seguro que desea eliminar el SPEC!!</p>"; ?>
<a href="http://maiadatacenter.co/DashBoard/Tools/Specs/controlador2/borrar/<?php echo $id_usuario?>"> 
	<button class="btn btn-success" type="button">
   		Si
   	</button>	
</a>

<a href="http://maiadatacenter.co/DashBoard/Tools/Specs/controlador2/mostrar_datos/">
	<button class="btn btn-warning" type="button">
   		No
   	</button>	
</a>

</body>
</html>