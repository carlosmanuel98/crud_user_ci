<?php
defined('BASEPATH') or exit('No direct script access allowed');

include(APPPATH . "controllers/General.php");

class UserController extends General
{

	public function __construct()
	{

		parent::__construct();
		$this->load->helper("url");
		$this->load->model('User');
	}

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['users'] = $this->User->getAllusers();
		$data['roles'] = $this->User->getAllRol();
		$this->load->view('layouts/menu');
		$this->load->view('user_table', $data);
		$this->load->view('layouts/footer');
	}

	public function register()
	{
		$response = $this->User->registerUser();
		if ($response) {
			$this->msgAlert("success", "user register");
			header("Location:" . site_url("UserController"));
		} else {
			$this->msgAlert("error", "user exist");
			header("Location:" . site_url("UserController"));
		}
	}

	public function update() 
	{
		$response = $this->User->updateUser();
		if ($response) {
			$this->msgAlert("success", "updated user");
			header("Location:" . site_url("UserController"));
		}
	}

	public function msgAlert($type, $msg)
	{

		(($type == "error") ? $type = "danger" : "");

		$template_msg = '<div class="alert alert-' . $type . '" id="msg-alert">
						<button type="button" class="close" data-bs-dismiss="alert">x</button>
						<strong>' . $type . '! </strong>' . $msg . '
						</div>';

		$this->session->set_flashdata('msg', $template_msg);
	}

	public function getUser()
	{
		$response 		   = $this->User->getUserById($this->input->post('id'));
		$response->roles   = $this->User->getAllRol();

		$view_response = $this->load->view('update_user', $response);
		echo json_encode($view_response);
	}

	public function deleteUser()
	{
		$msg = "User deleted successfully!";
		
		if($this->input->post('id') != 1){
			$this->User->deleteUser($this->input->post('id'));
			$response = [
				'msg' => 'User deleted successfully!',
				'type' => 'success'
			];
		}else{
			$response = [
				'msg' => 'Cannot be deleted',
				'type' => 'warning'
			];
		}


		echo json_encode($response);
	}
}