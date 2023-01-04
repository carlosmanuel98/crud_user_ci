<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_model {

	public function __construct(){
		parent::__construct();
	}

	private $table = "user";
	
	public function getLogin($email, $pass){

		$this->db->select("u.*, r.rol_description")->from("user u");
		$this->db->join("rol_user r","u.id_rol = r.id");
		$this->db->where("email", $email);
		$this->db->where("password",$pass);
		$query = $this->db->get();
		
		if(!$query->row()){
			return FALSE;
		}else{			
			return $query->row();
		}

	}
	public function array_session($queryObject){
		$datasession = array(
			'id'  => $queryObject->id,
			'email'     => $queryObject->email,
			'rol'     => $queryObject->id_rol,
			'logged_in' => TRUE
		);

		return $datasession;
	}
	
	//validate session
	public function login($email, $pass){

		$queryObject = $this->getLogin($email, $pass);

		if($queryObject){

			$array_session = $this->array_session($queryObject);
			$this->session->set_userdata($array_session);
		}
		return $queryObject;		
	}
}
