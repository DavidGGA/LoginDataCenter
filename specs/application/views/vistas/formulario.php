<?php echo "<h1>Registro Personas</h1>"; ?><br>
	<div class="error">
      <?php echo validation_errors(); ?>
    </div>
    <style type="text/css">
      .error{
      color: red;
      }
    </style>
<?= form_open("/controlador2/procesar/") ?>
	<?PHP
		$Mercado = array(
				'name' => 'mercado',
				'placeholder' => 'EJ: US,JM,MX...'

			);
		$Sitio = array(
				'name' => 'sitio',
				'placeholder' => 'EJ: DSP, Sojern, Tripadvisor...'
			);
		$Banner = array(
				'name' => 'banner',
				'placeholder' => 'Box, Sky, Leaderboard...'
			);
		$Size = array(
				'name' => 'size',
				'placeholder' => 'Dimensiones del archivo',

			);
		$Formato = array(
				'name' => 'formato',
				'placeholder' => 'formato del archivo',

			);
		$Weight = array(
				'name' => 'weight',
				//'placeholder' => 'EJ: 900*600',

			);
		$Clicktag = array(
				'name' => 'clicktag',
				'placeholder' => 'EJ: 10MB, 1GB, 40KB...',

			);
		$Observaciones = array(
				'name' => 'observaciones',
				'type' => 'url',
				'placeholder' => '',

			);
		/*$EmailAddress = array(
				'name' => 'email',
				'placeholder' => 'Ej: correo@correo.com',
				'type' => 'email'

			);*/
?>
		<!--<?= form_label('Nombre:','nombre') ?>
		<?= form_input($FirstName) ?>
		<br><br>
		<?= form_label('Apellido:','apellido') ?>
		<?= form_input($LastName) ?>
		<br><br>
		<?= form_label('Email:','email') ?>
		<?= form_input($EmailAddress) ?>
		<br><br>
		<?= form_submit('','Cargar Info') ?> ||
		<a href="http://localhost/repositorio/index.php/controlador2/index/"> 
			<button type="button" borde=0/>
        		Consultar Datos
    		</button>
		</a>
		<?php /*= form_submit('','Editar Info') ?>
		<?= form_submit('','Consultar Info') ?> ||
		<?= form_submit('','Borrar Info') */ ?>--> 
	<h5>Mercado</h5>
    <input type="text" name="mercado" placeholder="EJ: US,JM,MX..." value="<?php echo set_value('$Mercado'); ?>" size="50" />
    <h5>Sitio</h5>
    <input type="text" name="sitio" placeholder="EJ: DSP, Sojern, Tripadvisor..." value="<?php echo set_value('$Sitio'); ?>" size="50" />
    <h5>Banner</h5>
    <input type="text" name="banner" placeholder="Box, Sky, Leaderboard..." value="<?php echo set_value('$Banner'); ?>" size="50" />
    <h5>Size<br>(width/large)</h5>
    <input type="text" name="size" placeholder="EJ: 300*250, 160*600, 4:3..." value="<?php echo set_value('$Size'); ?>" size="50"/>
    <h5>Formato</h5>
    <input type="text" name="formato" placeholder="EJ: Png,jpg..." value="<?php echo set_value('$Formato'); ?>" size="50"/>
    <h5>Weight</h5>
    <input type="text" name="weight" placeholder="" value="<?php echo set_value('$Weight'); ?>" size="50"/>
    <br><br>
    <h5>ClickTag</h5>
    <input type="text" name="clicktag" placeholder="EJ: 10MB, 1GB, 40KB..." value="<?php echo set_value('$ClickTag'); ?>" size="50"/>
    <br><br>
    <h5>Observaciones</h5>
    <input type="url" name="observaciones" placeholder="" value="<?php echo set_value('$Observaciones'); ?>" size="50"/>
    <br><br>
    <!--<h5>###</h5>
    <input type="email" name="email" placeholder="Ej: correo@correo.com" value="<?php echo set_value('$EmailAddress'); ?>" size="50"/>-->
    <br>
    <div>
    	<input type="submit" value="Cargar datos" />////////////////////////
	    	<a href="http://maiadatacenter.co/specs/controlador2/mostrar_datos/">
		    	<button type="button" value="Volver">
		    		Volver
		    	</button>    	
	    	</a>
    </div>
    
    <!--<h5>Password</h5>
    <input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />
    <h5>Confirmar Password</h5>
    <input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />-->

<?= form_close() ?>
<br>

</body>
</html>