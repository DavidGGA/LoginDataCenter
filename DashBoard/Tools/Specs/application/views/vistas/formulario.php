<?php echo "<h1>Registro Specs</h1>"; ?><br>
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
<div class="contenedor" style="margin: 10px;">
<h5>Mercado</h5>

<select name="mercado">
	<option value="">Seleccionar</option>
	<option value="US">US</option>
	<option value="LATAM">LATAM</option>
	<option value="MX">MX</option>
	<option value="COL">COL</option>
</select>
<!--
<input type="text" name="mercado" placeholder="EJ: US,JM,MX otra cosa..." value="<?php echo set_value('$Mercado'); ?>" size="50" />
-->
<h5>Sitio</h5>
<select name="sitio">
	<option>Seleccionar</option>
	<option value="TripAdvisor">TripAdvisor</option>
	<option value="FACEBOOK">FACEBOOK</option>
	<option value="TWITTER">TWITTER</option>
	<option value="SOJERN">SOJERN</option>
	<option value="YouTube">YouTube</option>
	<option value="DSP">DSP</option>
	<option value="MEDULA">MEDULA</option>
</select>
<!--
<input type="text" name="sitio" placeholder="EJ: DSP, Sojern, Tripadvisor..." value="<?php echo set_value('$Sitio'); ?>" size="50" />
-->
<h5>Banner</h5>
<select name="banner">
	<option>Seleccionar</option>
	<option value="BOX">BOX</option>
	<option value="SKY">SKY</option>
	<option value="LEADERBOARD">LEADERBOARD</option>
	<option value="REF">REF</option>
</select>
<!--
<input type="text" name="banner" placeholder="Box, Sky, Leaderboard..." value="<?php echo set_value('$Banner'); ?>" size="50" />
-->
<h5>Size<br>(width/large)</h5>
<select name="size">
	<option value="150x600">150x600</option>
	<option value="180x150">180x150</option>
	<option value="120x600">120x600</option>
	<option value="200x100">200x100</option>
	<option value="200x200">200x200</option>
	<option value="234x60">234x60</option>
	<option value="250x250">250x250</option>
	<option value="300x100">300x100</option>
	<option value="300x250">300x250</option>
	<option value="300x50">300x50</option>
	<option value="320x50">320x50</option>
	<option value="400x250">400x250</option>
	<option value="468x60">468x60</option>
	<option value="500x450">500x450</option>
	<option value="600x500">600x500</option>
	<option value="728x90">728x90</option>
</select>
<!--
<input type="text" name="size" placeholder="EJ: 300*250, 160*600, 4:3..." value="<?php echo set_value('$Size'); ?>" size="50"/>
-->
<h5>Formato</h5>
<select name="formato">
	<option value="jpg">jpg</option>
	<option value="png">png</option>
	<option value="text">text</option>
	<option value="svg">svg</option>
	<option value="REF">REF</option>
</select>
<!--
<input type="text" name="formato" placeholder="EJ: Png,jpg..." value="<?php echo set_value('$Formato'); ?>" size="50"/>
-->
<h5>Weight</h5>
<input type="text" name="weight" placeholder="10MB - 234Kb">
<!--
<input type="text" name="weight" placeholder="" value="<?php echo set_value('$Weight'); ?>" size="50"/>
-->
<br>

<h5>ClickTag</h5>
<select name="clicktag">
	<option>Seleccionar</option>
	<option value="Tag">Tag A</option>
	<option value="Tag">Tag B</option>
	<option value="Tag">Tag C</option>
	<option value="Tag">Tag D</option>
</select>
<!--
<input type="text" name="clicktag" placeholder="" value="<?php echo set_value('$ClickTag'); ?>" size="50"/>
-->
<br>

<h5>Observaciones</h5>
<input type="text" name="observaciones" placeholder="http://www.unaurl.com" value="<?php echo set_value('$Observaciones'); ?>" size="50"/>
<br><br>
<!--<h5>###</h5>
<input type="email" name="email" placeholder="Ej: correo@correo.com" value="<?php echo set_value('$EmailAddress'); ?>" size="50"/>-->
<br>
<div>
	<input type="submit" class="btn btn-success" value="Guardar SPEC" />
	<a href="http://maiadatacenter.co/DashBoard/Tools/Specs/controlador2/mostrar_datos/">
		<button class="btn btn-info" type="button" value="Volver">
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
</div>
</body>
</html>