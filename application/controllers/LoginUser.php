<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginUser extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Login");
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
		$this->load->view('login');
	}

	public function login(){
		$user = $this->input->post("inputEmail");
		$pwd = md5($this->input->post("inputPassword"));
		$res = $this->Login->login($user, $pwd);

		$login = (($res) ? header("Location:".site_url("welcome")) : header("Location:".site_url("loginUser")));	
	
	}

	public function logOut(){
		$this->session->sess_destroy();
		session_write_close();
		header("Location:".site_url("loginUser"));
	}
}
