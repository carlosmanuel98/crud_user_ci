<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_model {

	public function __construct(){
		parent::__construct();
	}

	private $table = "user";
	
	public function getAllUsers(){

		$this->db->select("u.*, r.rol_description")->from("user u");
		$this->db->join("rol_user r","u.id_rol = r.id");
		
		$query = $this->db->get();
		
		if(!$query->row()){
			return FALSE;
		}else{			
			return $query->result();
		}
	}

	public function registerUser(){
		$first_name = $this->input->post("inputFirstName");
		$last_name 	= $this->input->post("inputLastName");
		$pw			=  md5($this->input->post("inputPassword"));
		$email 		= $this->input->post("inputEmail");
		$id_rol 	= $this->input->post("inputRol");

		$data = array(
			'first_name'	=>	$first_name,
			'last_name'		=>  $last_name,
			'password'		=>	$pw,
			'email'			=>	$email,
			'status'		=>	TRUE,
			'id_rol'		=>	$id_rol
		);
		$this->db->select("user.*")->from("user");
		$this->db->where('email', $email);
		$query = $this->db->get();
		$query->row();

		if($query->num_rows() > 0){
			return FALSE;			
		}else{
			$this->db->insert($this->table, $data);
		}
			return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function updateUser(){

		$first_name = $this->input->post("inputFirstName");
		$last_name 	= $this->input->post("inputLastName");
		$pw			= md5($this->input->post("inputPassword"));
		$email 		= $this->input->post("inputEmail");
		$id_rol 	= $this->input->post("inputRol");

		$data = array(
			'first_name'	=>	$first_name,
			'last_name'		=>  $last_name,
			'password'		=>	$pw,
			'id_rol'		=>	$id_rol
		);
	
		$this->db->where('email', $email);
		$this->db->update($this->table, $data);

			return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function getAllRol(){
		$this->db->select("r.*")->from("rol_user r");
		$query = $this->db->get();
		
		if(!$query->row()){
			return FALSE;
		}else{			
			return $query->result();
		}
	}

	public function getUserById($user_id = null){

		$this->db->select("u.*, r.rol_description")->from("user u");
		$this->db->join("rol_user r","u.id_rol = r.id");
		if($user_id != null){
			$this->db->where('u.id', $user_id);
		}
		$query = $this->db->get();
		
		if(!$query->row()){
			return FALSE;
		}else{			
			return $query->row();
		}
	}

	public function deleteUser(){
		
		$id = $this->input->post("id");

		$this->db->where('user.id', $id);
    	$this->db->delete($this->table);

		if(!$this->db->affected_rows()){
			return FALSE;
		}
			return TRUE;
	}
}
