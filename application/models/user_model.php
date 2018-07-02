<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function insert_user($enc_password)
	{
		$data = array(
			'id' => '',
			'username' => $this->input->post('username'),
			'password' => $enc_password,
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'id_level' => $this->input->post('level')
		);

		$this->db->insert('user', $data);
	}

	public function login($username, $password){
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user');

        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    function get_user_level($user_id)
    {
        // Dapatkan data user berdasar $user_id
        $this->db->select('id_level');
        $this->db->where('id', $user_id);

        $result = $this->db->get('user');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }
    }

	function get_user_details($user_id)
    {
        $this->db->join('level_user', 'level_user.id = user.id_level', 'left');
        $this->db->where('user.id', $user_id);

        $result = $this->db->get('user');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }
    }
}