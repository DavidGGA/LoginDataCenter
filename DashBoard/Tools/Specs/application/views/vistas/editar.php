<div align="center">
<?php echo "<h1>Actualizar Perfil</h1>"; ?><br>
  <div class="form-group" style="width:60%">
    
  
<?= form_open("/controlador2/actualizarperfil/".$id) ?>
<?php
	$Mercado = array(
			'name' => 'Mercado',
			'placeholder' => 'EJ: US,JM,MX...',
            'class' => 'form-control',
			'value' => $actu[0]->Mercado,
		);
	$Sitio = array(
			'name' => 'Sitio',
			'placeholder' => 'EJ: DSP, Sojern, Tripadvisor...',
            'class' => 'form-control',
			'value' => $actu[0]->Sitio,
		);
	$Banner = array(
			'name' => 'Banner',
			'placeholder' => 'EJ: Box, Sky, Leaderboard...',
            'class' => 'form-control',
			'value' => $actu[0]->Banner,
		);	
	$Size = array(
			'name' => 'Size',
			'placeholder' => 'EJ: 300*250, 160*600, 4:3...',
            'class' => 'form-control',
			'value' => $actu[0]->Size,
		);
	$Formato = array(
			'name' => 'Formato',
			'placeholder' => 'png,jpg...',
            'class' => 'form-control',
			'value' => $actu[0]->Formato,
		);
	$Weight = array(
			'name' => 'Weight',
            'class' => 'form-control',
			'placeholder' => 'EJ: 100MB, 1GB, 40KB...',
			'value' => $actu[0]->Weight,
		);
	$ClickTag = array(
			'name' => 'ClickTag',
			'placeholder' => 'EJ: 100MB, 1GB, 40KB...',
            'class' => 'form-control',
			'value' => $actu[0]->ClickTag,
		);	
	$Observaciones = array(
			'name' => 'Observaciones',
            'class' => 'form-control',
			'type' => 'text',
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
	</div>
	</div>
</body>
</html>