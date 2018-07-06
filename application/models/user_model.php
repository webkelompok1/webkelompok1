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

    public function edit_data_user($where,$table)
    {       
    return $this->db->get_where($table,$where);
    }

    public function update_data_user($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapusdatauser($id)
    {
        $row = $this->db->where('id',$id)->get('user')->row();

        $this->db->where('id', $id);

        $this->db->delete('user', array('id' => $id));
    }

    function get_user_level($id)
    {
        // Dapatkan data user berdasar $user_id
        $this->db->select('id_level');
        $this->db->where('id', $id);

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