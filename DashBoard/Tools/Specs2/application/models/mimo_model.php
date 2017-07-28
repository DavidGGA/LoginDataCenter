<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mimo_model extends CI_Model 
{
	function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}
	public function crearId($data){
		$this->db->insert('users', $data);
		$insert_id = $this->db->insert_id();
		redirect('/controlador2/index/'.$insert_id);
		//$this->db->insert('users',array('FirstName'=>$data['nombre'], 'LastName'=>$data['apellido'], 'EmailAddress'=>$data['email']));
		//print_r($data);
		//$this->db->insert('users',array('nombre'=>$nombre,'apellido'=>$apellido,'email'=>$email));
        //$insert_id = $this->db->insert_id();
        //echo $insert_id;
	}
	//hacemos la búsqueda de las poblaciones en el 
	//evento keyup de jquery
	public function buscador_users($abuscar)
    {
        //usamos after para decir que empiece a buscar por
        //el principio de la cadena
        //ej SELECT poblacion from poblacion
        //WHERE poblacion LIKE '%$abuscar' limit 12
        $this->db->select('Mercado, Sitio, Banner, Size, Formato, Weight, ClickTag, Observaciones');
        $this->db->like('Mercado', $abuscar,'after');
        $this->db->or_like('Sitio', $abuscar, 'after' );
        $this->db->or_like('Banner', $abuscar, 'after' );
        $this->db->or_like('Size', $abuscar, 'after' );
        $this->db->or_like('Formato', $abuscar, 'after' );
        $this->db->or_like('Weight', $abuscar, 'after' );
        $this->db->or_like('ClickTag', $abuscar, 'after' );
 
        $resultados = $this->db->get('users', 12);
 
        //si existe algún resultado lo devolvemos
        if($resultados->num_rows() > 0)
        {
 
            return $resultados->result();
 
        //en otro caso devolvemos false
        }else{
 
            return FALSE;
 
        }
 
    }
	function obtenerdatos(){
		$query = $this->db->get('users');
		if($query->num_rows() > 0) 
			return $query;
		else 
			return false;
	}
	function obtenerdato($id){

		$this->db->where('id_user',$id);
		$query = $this->db->get('users');
		$data = $query->result();
		//print_r($data);
		if($query->num_rows() > 0) 
			return $data;
		else 
			return false;
	}
	function datoindividual($id){
		$this->db->where('id_user',$id);
		$query = $this->db->get('users');
		if($query->num_rows() > 0) 
			return $query;
		else 
			return false;
	}

	function actualizarperfil($id,$data){
		//print_r($data);
		$datos = array(
			'Mercado'=>$data['Mercado'],
			'Sitio'=>$data['Sitio'],
			'Banner'=>$data['Banner'],
			'Size'=>$data['Size'],
			'Formato'=>$data['Formato'],
			'Weight'=>$data['Weight'],
			'ClickTag'=>$data['ClickTag'],
			'Observaciones'=>$data['Observaciones'],
			//'EmailAddress'=>$data['EmailAddress'],
		);
		$this->db->where('id_user',$id);
		$query = $this->db->update('users', $datos);
	}
	function eliminardato($id){
		$this->db->delete('users', array('id_user'=>$id));
		redirect('/controlador2/mostrar_datos/');
		//$this->load->view('vistas/bienvenido');
			# code...
		}
	//obtenemos todos los mensajes a mostrar en la tabla   
	function users()
	{
		$query = $this->db->get('users');
			foreach ($query->result() as $fila) 
			{
				# code...
				$data[] = $fila;
			}
		return $data;
	}
	 //obtenemos la fila completa del mensaje a editar
    //vemos que como solo queremos una fila utilizamos
    //la función row que sólo nos devuelve una fila,
    //así la consulta será más rápida
    function obtener()
    {
    	//$this->db->where('id', $id);
    	$query = $this->db->get('users');
    	$fila = $query->result();
    	return $fila;

    }
    //actualizamos los datos en la base de datos con el patrón
    //active record de codeIginiter, recordar que no hace falta
    //escapar las consultas ya que lo hace él automaticámente
    /*function actualizar_users($id, $nombre, $apellido, $email)
    {
    	$data = array(
    		'FirstName' => $nombre,
    		'LastName' => $apellido,
    		'EmailAddress' => $email,	
    	);
    	$this->db->where('id_user', $id);
    	return $this->db->update('users', $data);
    }*/
    function search($keyword)
    {
    	//echo $keyword;
        $this->db->like('id_user',$keyword);
        $this->db->or_like('Mercado',$keyword);
        $this->db->or_like('Sitio',$keyword);
        $this->db->or_like('Banner',$keyword);
        $this->db->or_like('Size',$keyword);
        $this->db->or_like('Formato',$keyword);
        $this->db->or_like('Weight',$keyword);
        $this->db->or_like('ClickTag',$keyword);
        $this->db->or_like('Observaciones',$keyword);
        //$this->db->or_like('EmailAddress',$keyword);
        $query  =   $this->db->get('users');
        //print_r($query->result() );
        return $query->result();


    }


}

?>

