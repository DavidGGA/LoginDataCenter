<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controlador2 extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		$this->load->helper('form');
		$this->load->model('mimo_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
		/*'<?php <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" ?>';
		'<?php <script src="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" ?>';*/
		// IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded!
        // It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
        //$this->auth = new stdClass;
        // Load 'standard' flexi auth library by default.
        //$this->load->library('flexi_auth');
	}

	function index()
	{
		//echo base_url();
		$data['segmento'] = $this->uri->segment(3);
		$this->load->view('vistas/headers');
		if (!$data['segmento'])
		{
			$data['reposiview'] = $this->mimo_model->obtenerdatos();
			# code...
		}
		else
		{
			$data['reposiview'] = $this->mimo_model->datoindividual($data['segmento']);
		}
		//$this->load->view('vistas/bienvenido',$data);
		redirect('controlador2/mostrar_datos');

		//$this->load->view('vistas/mensajes');
		//index buscador

		$data['tabla'] = array('titulo' => 'Buscador con múltiples criterios de busqueda :D', 
					  'resultados' => $this->busqueda());
					  
		$this->load->view('vistas/datos',$data);
	}
	//aquí es donde hacemos toda la búsqueda

	//public function buscador()
	//{

	//}
	//a través de jquery llenamos el autocompletado
	public function usuarios()
    {
       //echo "algo1";exit;
        //si es una petición ajax y existe una variable post
        //llamada info dejamos pasar
        if($this->input->is_ajax_request() && $this->input->post('info'))
        {
 
            $abuscar = $this->security->xss_clean($this->input->post('info'));
 			//esta bien este saelect ? si
            $search = $this->mimo_model->buscador_users($abuscar);
 
            //si search es distinto de false significa que hay resultados
            //y los mostramos con un loop foreach
            $array = json_decode(json_encode($search), true);
            //var_dump($array);
            $datitos = json_encode($array);
            //var_dump($datitos);
            print_r($datitos);exit;
            if($datitos !== FALSE)
            {		
                foreach($datitos as $fila)
                {
                ?>
 
                    <p><a title="<?php echo $fila->users ?>" id="jum" href="" 
                    	onclick="$('.users').val($(this).attr('title')); ">
                    	<?php echo $fila->users ?>
                    </a></p>
                <?php
                }
 
            //en otro caso decimos que no hay resultados
            }
            else
            {
            ?>
 
                <p><?php echo 'No hay resultados' ?></p>
 
            <?php
            }
 
        }
    }

	function nuevo()
	{
		if ($this->mimo_model->obtener()) 
		{
			$this->load->view('vistas/headers');
			$this->load->view('vistas/formulario');
		}
		else
		{
			$this->load->view('vistas/mensajes');
		}
	}

	function recibirdatos()
	{
		//echo $this->input->POST('observaciones');
		$data = array(

				'Mercado' =>$this->input->post('mercado'),
				'Sitio' =>$this->input->post('sitio'),
				'Banner' =>$this->input->post('Banner'),
				'Size' =>$this->input->post('size'),
				'Formato' =>$this->input->post('formato'),
				'Weight' =>$this->input->post('weight'),
				'ClickTag' =>$this->input->post('clicktag'),
				'Observaciones' =>$this->input->post('observaciones'),
				//'EmailAddress' =>$this->input->post('email')
			);
		$this->mimo_model->crearId($data);
		$this->load->view('vistas/headers');
		//$this->load->view('vistas/bienvenido');
		//print_r($data);
		//$this->db->insert('users', $data);
        //$insert_id = $this->db->insert_id();
	}

	function editar($id = 0)
	{
		if($id != 0){

		$data ['id'] = $id;
		//$data ['id'] = $this->uri->segment(3);
		//print 'algo='.$this->mimo_model->obtenerdato($data['id']);
		$data['actu'] = $this->mimo_model->obtenerdato($data['id']);
		$this->load->view('vistas/headers');
		$this->load->view('vistas/editar',$data);
		} else {
			redirect('vistas/mensajes');
		}
	}

	function borrar($id)
	{
		//$data ['id'] = $id;
		$id = $this->uri->segment(3);
		$this->mimo_model->eliminardato($id);
		//$data ['id'] = $this->uri->segment(3);
		//print 'algo='.$this->mimo_model->obtenerdato($data['id']);
	}

	function actualizarperfil()
	{
		//print_r($_POST);
		$data = array(
			'Mercado' => $this->input->post('Mercado'),
			'Sitio' => $this->input->post('Sitio'),
			'Banner' =>$this->input->post('Banner'),
			'Size' => $this->input->post('Size'),
			'Formato' => $this->input->post('Formato'),
			'Weight' => $this->input->post('Weight'),
			'ClickTag' => $this->input->post('ClickTag'),
			'Observaciones' => $this->input->post('Observaciones'),
			//'EmailAddress' => $this->input->post('Email')
		);
		$this->mimo_model->actualizarperfil($this->uri->segment(3),$data);
		$this->load->view('vistas/mensajes');
		//redirect('/controlador2/mostrar_datos/'); 
		//$this->load->view('vistas/bienvenido');
		//$this->load->view('vistas/editar');
		//die($this->uri->segment(3));

		//$this->load->view('vistas/headers');
	}

	/*function start()
	{
		$this->load->view('vistas/headers');
		$this->load->view('vistas/start');
		$this->load->helper('url');
	}*/

	/*public function indexx()
    {
        $this->load->view('vistas/formulario');
    }*/
     
    public function procesar()
    {
		//print_r($data);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mercado', 'Mercado', 'required|min_length[1]');
        $this->form_validation->set_rules('sitio', 'Sitio', 'required|min_length[1]');
        $this->form_validation->set_rules('banner', 'Banner', 'required|min_length[1]');
        $this->form_validation->set_rules('size', 'Size', 'required|min_length[1]');
         $this->form_validation->set_rules('formato', 'Formato', 'required|min_length[1]');
        $this->form_validation->set_rules('weight', 'Weight', 'required|min_length[1]');
        $this->form_validation->set_rules('clicktag', 'ClickTag', 'required|min_length[1]');
        $this->form_validation->set_rules('observaciones', 'Observaciones', 'required|min_length[1]');
        //$this->form_validation->set_rules('email', 'Email', 'required|valid_email');


         
        //$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        //$this->form_validation->set_rules('LastName', 'apellido', 'required');
    	if ($this->form_validation->run() == FALSE) 
   	 	{
    		$respuesta = preg_replace( "/\n/", "", validation_errors() );
        	//echo $respuesta;
        	$this->load->view('vistas/formulario');
    	}
    	else 
    	{
        	//echo "Datos cargados correctamente";
    		$data = array
    		(
				'Mercado' =>$this->input->post('mercado'),
				'Sitio' =>$this->input->post('sitio'),
				'Banner' =>$this->input->post('banner'),
				'Size' =>$this->input->post('size'),
				'Formato' =>$this->input->post('formato'),
				'Weight' =>$this->input->post('weight'),
				'ClickTag' =>$this->input->post('clicktag'),
				'Observaciones' =>$this->input->post('observaciones'),
				//'EmailAddress' =>$this->input->post('email')
			);
			$this->mimo_model->crearId($data);
        	//$this->load->view('vistas/bienvenido');
   		}		
    }

    /*function index_x()
    {
    	$data['titulo'] = 'Actualizar Perfil';
    	$data['users'] = $this->mimo_model->users();
    	$this->load->view('datos_view', $data);
    } */ 

    function mostrar_datos()
	{
       // '<a href="http://maiadatacenter.co/logout.php">Logout</a>';
		echo "<h2>Bienvenido Specs Maia</h2>";
		
		//$id = $this->input->post('id');
		//die($id);
        $edicion = $this->mimo_model->obtener();


        $data['tabla'] = '';

        $data['tabla'] .= '<table id="myTable" name="myTable" class="table table-bordered table-hover table-condensed" style="width:100%">';

        $data['tabla'] .= '<tr>
        						<!--<th>Id Specs</th>-->
						    	<th>Mercado</th>
						    	<th>Sitio</th>
						    	<th>Banner</th>
						    	<th>Size<br>(width/large)</th> 
						    	<th>Formato</th> 
						    	<th>Weight</th>
						    	<th>ClickTag</th>
						    	<th>Observaciones</th>
						    	<th>Editar</th>
						    	<th>Eliminar</th>
						    	
						  </tr>';


		foreach ($edicion as $key => $value) {
			/*echo "<pre>";
	        print_r($value);
	        echo "</pre>";
			    					<a href="'.base_url().'controlador2/borrar/'.$value->id_user.'">Eliminar</a></td>
		    echo $value->FirstName;*/
			$data['tabla'] .= ' <tr>
			    					<!--<td><center>'.$value->id_user.'</center></td>-->
			    					<td><center>'.$value->Mercado.'</center></td>
			   						<td><center>'.$value->Sitio.'</center></td>
			   						<td><center>'.$value->Banner.'</center></td>
			    					<td><center>'.$value->Size.'</center></td>
			    					<td><center>'.$value->Formato.'</center></td>
			    					<td><center>'.$value->Weight.'</center></td>
			    					<td><center>'.$value->ClickTag.'</center></td>
			    					<td>'.$value->Observaciones.'</td>
			    					
			    					<td><center><a href="'.base_url().'controlador2/editar/'.$value->id_user.'"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></center></td>
									
									<td><center><a href="'.base_url().'controlador2/eleccion/'.$value->id_user.'"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></center></td>

			    					
			 					 </tr>';		
		        } 
			 
			    					

		    $data['tabla'] .= ' </table>';
			$this->load->view('vistas/datos', $data);			
	}

	function search_keyword()
        {
            //print_r($_POST);
            $keyword    =   $this->input->post('keyword');
            //echo "algo" .$keyword;
            $data['results']    =   $this->mimo_model->search($keyword);
            //print_r($data['results']);
            $this->load->view('vistas/result_view',$data);
            echo "<h1>Resultado de su búsqueda</h1>";           
        }

	function eleccion($id_user = 0)
	{
		if ($id_user != 0){
			
		$data['id_usuario'] = $id_user;
		$this->load->view('vistas/eleccion', $data);
		} else{
			redirect('controlador2/mostrar_datos');
		}
	}

	//Crear vista//
	/*function search_keyword()
	{
		$keyword = $this->input->post('keyword');
		$data['results'] = $this->mimo_model->search('$keyword');
		$this->load->view('vistas/result_view' , $data);
	}*/

	//Consulta o funcion para extraer archivox//
	function exportar()
	{
		//print_r($_POST);exit;

		$ids = array();

		foreach ($_POST as $valor) {
			    //echo $valor;

			    $ids[] = $valor;
			}

			//print_r($ids);exit;

		$this->load->library('PHPExcel');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();



		// Set document properties
		$objPHPExcel->getProperties()
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Test document for Office 2007 XLSX, generated by PHP classes.")
			->setKeywords("office 2007 openxml php")
			->setCategory("Test result file");

		
		//$this->db->from('Usuarios');
		//$this->db->order_by("company", "ASC");
		$this->db->from('users');
		$this->db->where_in('id_user', $ids);
        $query = $this->db->get();

        // $this->db->from('cccl_company');
        //     $this->db->where(array('id_company IS NOT NULL' => null, 'id_company !=' => 1));
        //     $this->db->order_by($company_field, $company_order);
        //     $query = $this->db->get();


		$arrayUsuarios =  $query->result();

		//print_r($arrayUsuarios);exit;
		//echo $this->db->last_query();exit;

		if(count($arrayUsuarios) > 0)
		{

			$num = 3;

			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B1', 'Specs')
				->setCellValue('A2', 'ID')
				->setCellValue('B2', 'Mercado')
				->setCellValue('C2', 'Sitio')
				->setCellValue('D2', 'Banner')
				->setCellValue('E2', 'Size(Width/large)')
				->setCellValue('F2', 'Formato')
				->setCellValue('G2', 'Weight')
				->setCellValue('H2', 'ClickTag')
				->setCellValue('I2', 'Observaciones');
				//->setCellValue('H2', 'Email');

		foreach ($arrayUsuarios as $key => $value) 
		{

			

		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$num, $value->id_user)
			->setCellValue('B'.$num, $value->Mercado)
			->setCellValue('C'.$num, $value->Sitio)
			->setCellValue('D'.$num, $value->Banner)
			->setCellValue('E'.$num, $value->Size)
			->setCellValue('F'.$num, $value->Formato)
			->setCellValue('G'.$num, $value->Weight)
			->setCellValue('H'.$num, $value->ClickTag)
			->setCellValue('I'.$num, $value->Observaciones);
			//->setCellValue('H'.$num, $value->EmailAddress);
			//->setCellValue('B'.$num, $status)
			//->setCellValue('F'.$num, $value->user_asign)
			//->setCellValue('G'.$num, $value->mail_asign);
		$num++;
		}
		}
		else
		{
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B3', 'No records');
		}

		// Rename worksheet (worksheet, not filename)
		$objPHPExcel->getActiveSheet()->setTitle('Exportar'.$hoy = date("Ymd"));


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		//clean the output buffer
		ob_end_clean();

		//this is the header given from PHPExcel examples. but the output seems somewhat corrupted in some cases.
		//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		//so, we use this header instead.
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Reporte'.$hoy = date("Ymd").'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		redirect('mainp');
	}

	/*function formlogin()
	{

		$this->load->model('flexi_auth_model');
        $email = 'fernando.quiroga@ariadnacg.com';
        $username = 'Administrador';
        $password = 'Fer960410';
        $user_data = array(
            'custom_col_1' => 'custom_value_1',
            'custom_col_2' => 'custom_value_2'
        );
        $group_id = 1;

        $this->flexi_auth_model->insert_user($email, $username, $password, $user_data, $group_id);

		/*$this->load->view('/vistas/login');

	}*/

	///////////////////////////////////////////////////
	///////////////////////LOGIN//////////////////////
	/////////////////////////////////////////////////
	function login()
	{
		
		//set validation rules 
		/*$this->form_validation->set_rules('login_identity', 'Usuario', 'required');
		$this->form_validation->set_rules('login_password', 'Contraseña', 'required');

		//Run the validation
		if ($this->form_validation->run())
		{
			//verify login data
			$this->flexi_auth->login($this->input->post('login_identity'), $this->input->post('login_password'));

			// Save any public status or error messages
        	//(Whilst suppressing any admin messages) to CI's flash session data.
        	$this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        	// Reload page, if login was successful, sessions will
        	// have been created that will then further redirect verified users.
        	redirect('/controlador2/mostrar_datos/');
    	} 
    	else
    	{

        // Set validation errors.
        $this->data['message'] = validation_errors('<p class="error_msg">', '</p>');
        return FALSE;*/
        $data['error'] = '';
        if ($this->input->post('submit')) { 
            if($this->input->post('login_identity') && $this->input->post('login_password'))
            {
            	//die('aca');
                $this->load->model('flexi_auth_model');
                if ($this->flexi_auth_model->login($this->input->post('login_identity'), $this->input->post('login_password'))) 
                {


                    /*switch ($this->flexi_auth->get_user_group_id()) {
                        case '1':
                            redirect('#');
                            break;
                        case '2':
                            redirect('#');
                            break;
                        case '3':
                            redirect('#');
                            break;                                
                        default:
                            die('Acceso register');
                            redirect('register');
                            break;
                    }*/
                    redirect('/controlador2/mostrar_datos/');

                } 
                else 
                {

                    $data['error'] = 'Usuario o contraseña erroneos<br>';
                }
            }
            else
            {                
                if(!$this->input->post('login_identity'))
                    $data['error'] = "<p>No ingreso un usuario.</p>";
                if(!$this->input->post('login_password'))
                    $data['error'] = "<p>No ingreso su contraseña.</p>";
                if(!$this->input->post('login_identity') && !$this->input->post('login_password'))
                	$data['error'] = "<p>Los campos estan vacios.</p>";
            }
        }
        //$data['main_container'] = 'content/view_login';
        $this->load->view('/vistas/login', $data);

	}
}

?>