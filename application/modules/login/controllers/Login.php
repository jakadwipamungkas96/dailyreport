<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as Capsule;

class Login extends Drn_Controller {

	
	function __construct()
	{
		parent::__construct();
	}

	
	public function index_get()
	{

	    // Initialize the array with a 'title' element for use for the <title> tag.
		$this->data['title'] = 'Login';
		$this->data['page'] = 'login';

		// print_r('<pre>');
        // print_r($this->session->userdata());
        // // print_r($_POST);
        // exit();

		$this->data['js'] = array(
			// 'assets/bootstrap/datepicker/js/bootstrap-datetimepicker.min.js'
		);

		$this->data['css'] = array(
			// 'assets/bootstrap/datepicker/css/bootstrap-datetimepicker.min.css'
		);

		$this->template->load($this->data, "login", 'index');

	}

	public function index_post()
	{

		$this->load->model('UsersDB');

		$error = true;

		if($_POST['username'] == null && $_POST['password'] == null){

			// $this->response(array('error' => true, 'message' => 'Please fill username and password!'));
			$this->session->set_flashdata('alert', array('msg' => 'warning', 'msg_value' => 'Please input your username and password!'));
			redirect(base_url().'login');

		}else{
			
			$users = $this->UsersDB->getUser($_POST['username']);

			if ($users) {

		    	$check = setDecrypt($users->psswd, $_POST['password']);

		    	if ($check) {

					$data = array(
						'last_login' => date("Y-m-d H:i:s")
					);

					$this->db->where('username', $_POST['username']);
					$this->db->update('users', $data);

		    		$this->session->set_userdata([
							'authDRN' => [
								'id'		=> $users->id,
								'username'	=> $users->username,
								'fullname'	=> $users->fullname
							]
					]);

		    		$error = false;
		    		$message = 'User valid, please wait!';

		    	}else{
		    		$error = true;
		    		$message = 'Username or password wrong!';
		    	}

			}else{
				$error = true;
				$message = 'User not found!';
			}

			redirect(base_url('dashboard'));

			// $this->set_response(['error' => $error, 'message' => $message, 'url' => $url]);
		}
	}

	public function logout_get()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
