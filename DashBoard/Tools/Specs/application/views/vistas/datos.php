<?php $this->load->view('vistas/headers'); ?>
<a href="http://maiadatacenter.co/logout.php">
    <button class="btn btn-danger" type="button" id="logout" style="float: right;">
            Logout	
    </button>
</a>
<a href="http://maiadatacenter.co/DashBoard/Tools/Specs/controlador2/nuevo/">
    <button class="btn btn-success" type="button">
	  	    Crear SPEC
    </button>
</a>
<button class="btn btn-info" id="btnMostrar" onclick="mostrarTabla()" type="button">
    Editar SPEC
</button>
<!--/////////////////BUSCADOR NUEVO//////////////////-->
<br>
<br>
<br>
<div align="center" class="buscadorON">
    <div>
        <!--<h2>Buscador múltiples criterios</h2>-->
        <?php $atributos = array('class' => 'formulario') ?>
        <?php echo form_open('buscador',$atributos) ?>

        <!--este es nuestro autocompletado-->
        <input type="text" width="200" autocomplete="off" onpaste="return false" name="users" id="users" class="users form-control" placeholder="Buscador de múltiples criterios" />

        <div class="muestra_users">
            <table id="DataTable" class="success table table-bordered table-hover table-condensed" border="1">
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

<form id="myFormu" action="<?php echo site_url('controlador2/exportar/');?>" method="post" align="center" style="display: none;">
    <?PHP echo $tabla; ?>
    <br>
   <!-- <input type="submit" class="btn btn-primary" value="Exportar" />-->
</form>

<div align="center" class="buscadorON">
<h2>Seleccionados:</h2>
<table id="selectsTable" class="table table-bordered table-condensed table-striped">
    <tbody>
        <tr class="success">
            <th>Mercado</th>
            <th>Sitio</th>
            <th>Banner</th>
            <th>Size</th>
            <th>Formato</th>
            <th>Weight</th>
            <th>ClickTag</th>
            <th>Observaciones</th>
            <th class="noExl">Deseleccionar</th>            
        </tr>
    </tbody>
</table>
<button class="btn btn-info" id="export2excel">Exportar</button>
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js'></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(window).load(function() {

        //alert("hola");

        //window.setTimeout($('#myTable2').DataTable(), 5000);


        $("#checktodos").change(function() {

            if ($(this).parent().find('input').is(':checked')) {
                //something();
                $(".hola").prop("checked", true);
            } else {
                $(".hola").prop("checked", false);
            }

            //$( ".hola" ).prop( "checked", true );
            //$("#checktodos").prop('checked', $(this).prop("checked"));
        });
    });

    function mostrarTabla() {
        var x = document.getElementById('myFormu');
        if (x.style.display === 'none') {
            x.style.display = 'block';
            $(".buscadorON").hide();
             $("#btnMostrar").html("Volver");
        } else {
            x.style.display = 'none';
             $(".buscadorON").show();
            $("#btnMostrar").html("Editar Specs");
        }
    }
    ////////////////
var f = new Date();
$("#export2excel").click(function(){
  $("#selectsTable").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Specs",
    filename: "Specs"+(f.getDate() + "_" + (f.getMonth() +1) + "_" + f.getFullYear()+"_Hora_"+f.getHours()+"_"+f.getMinutes())  //do not include extension
  });
});


</script>
<script type="text/javascript" src="<?php echo base_url('js/funciones.js?'.time()) ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/dynatable.js?'.time()) ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/table2excel.js?'.time()) ?>"></script>


</body>

</html>
