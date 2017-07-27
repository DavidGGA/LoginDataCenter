<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
// $this->load->model('article_content_model');
// Load required CI libraries and helpers.
	public function __construct() {
        parent::__construct();
        $this->load->database();
        //$this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');

        // IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded!
        // It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
        //$this->auth = new stdClass;

        // Load 'standard' flexi auth library by default.
        //$this->load->library('flexi_auth');
    }

	public function index()
	{
		/*$this->db->select('nombre, apellido');    
        $this->db->from('users');
        $this->db->where(array('id_user' => 1));
        $query = $this->db->get();
        $arrayUser = $query->result();
       	print_r($arrayUser);*/
       	$dato['string'] = 'test ';
		$this->load->view('welcome_message',$dato);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */