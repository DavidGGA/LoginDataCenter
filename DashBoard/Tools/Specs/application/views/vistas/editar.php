<?php echo "<h1>Actualizar Perfil</h1>"; ?><br>
<?= form_open("/controlador2/actualizarperfil/".$id) ?>
<?php
	$Mercado = array(
			'name' => 'Mercado',
			'placeholder' => 'EJ: US,JM,MX...',
			'value' => $actu[0]->Mercado,
		);
	$Sitio = array(
			'name' => 'Sitio',
			'placeholder' => 'EJ: DSP, Sojern, Tripadvisor...',
			'value' => $actu[0]->Sitio,
		);
	$Banner = array(
			'name' => 'Banner',
			'placeholder' => 'EJ: Box, Sky, Leaderboard...',
			'value' => $actu[0]->Banner,
		);	
	$Size = array(
			'name' => 'Size',
			'placeholder' => 'EJ: 300*250, 160*600, 4:3...',
			'value' => $actu[0]->Size,
		);
	$Formato = array(
			'name' => 'Formato',
			'placeholder' => 'png,jpg...',
			'value' => $actu[0]->Formato,
		);
	$Weight = array(
			'name' => 'Weight',
			//'placeholder' => 'EJ: 800*600',
			'value' => $actu[0]->Weight,
		);
	$ClickTag = array(
			'name' => 'ClickTag',
			'placeholder' => 'EJ: 10MB, 1GB, 40KB...',
			'value' => $actu[0]->ClickTag,
		);	
	$Observaciones = array(
			'name' => 'Observaciones',
			'type' => 'url',
			//'placeholder' => 'EJ: 1,2,3 etc.',
			'value' => $actu[0]->Observaciones,
		);				
	/*$EmailAddress = array(
			'name' => 'Email',
			'placeholder' => 'Ej: ejemplo@mail.com',
			'type' => 'email',
			'value' => $actu[0]->EmailAddress,
		);*/
		//echo $FirstName;	
?>			
		<?= form_label('Mercado:','mercado') ?>
		<?= form_input($Mercado) ?>
		<br><br>
		<?= form_label('Sitio:','sitio') ?>
		<?= form_input($Sitio) ?>
		<br><br>
		<?= form_label('Banner:','banner') ?>
		<?= form_input($Banner) ?>
		<br><br>
		<?= form_label('Size:','size') ?>
		<?= form_input($Size) ?>
		<br><br>
		<?= form_label('Formato:','formato') ?>
		<?= form_input($Formato) ?>
		<br><br>
		<?= form_label('Weight:','weight') ?>
		<?= form_input($Weight) ?>
		<br><br>
		<?= form_label('ClickTag:','clicktag') ?>
		<?= form_input($ClickTag) ?>
		<br><br>
		<?= form_label('Observaciones:','observaciones') ?>
		<?= form_input($Observaciones) ?>
		<!--<br><br>
		<?= form_label('Email:','email') ?>
		<?= form_input($EmailAddress) ?>-->
		<br><br>
		<?= form_submit('','Actualizar Specs', "class='btn btn-warning'") ?>
		<a href="http://maiadatacenter.co/DashBoard/Tools/Specs/controlador2/mostrar_datos/">
		    	<button class="btn btn-info" type="button" value="Volver">
		    		Volver
		    	</button>    	
	    	</a>

	<?= form_close() ?>
</body>
</html>