$(document).ready(function(){

    //utilizamos el evento keyup para coger la información
    //cada vez que se pulsa alguna tecla con el foco en el buscador
    $(".users").keyup(function(){
 		console.log($(this).html())
        //en info tenemos lo que vamos escribiendo en el buscador
        var info = $(this).val();
        //hacemos la petición al método poblaciones del controlador buscador
        //pasando la variable info
        $.post('usuarios',{ info : info }, function(data){
 
            //si autocompletado nos devuelve algo
            if(data != '')
            {
 
                //en el div con clase contenedor mostramos la info
                $(".muestra_users").show();
                $(".muestra_users").html(data);
 				
            }else{
 
                $(".muestra_users").html('');
 
            }
        })
 
    })
 

 // 	$(".muestra_users").find("a").live('click',function(e){
	// 	e.preventDefault();
	// 	$(".muestra_users").hide();
	// });
	
	//al hacer submit al formulario comprobamos que
	//los 3 campos no vengan vacíos
	/*$(".formulario").submit(function(){
		
		var poblacion = $(".poblacion").val();
		var sector = $(".sector").val();
		var descripcion = $(".descripcion").val();
		
		if(poblacion == '' && sector == '' && descripcion == '')
		{
			
			alert('Escoge algún filtro para tu búsqueda');
			return false;
			
		}
	})*/
})
