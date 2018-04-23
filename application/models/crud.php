<?php
class Crud extends CI_Model {

	public function get_konten()
	{
		$query = $this->db->get('berkas');
		return $query->result();
	}

	public function upload()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']  = '2048';
		$config['remove_space']  = TRUE;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('defile')){
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert($upload)
	{
		$data = array(
			'id' => '',
			'nama_file' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi'),
			'tgl_file' => date("Y-m-d H:i:s"),
			'isi_file' => $upload['file']['file_name']
		);

		$this->db->insert('berkas', $data);
	}

	public function edit_data($where,$table)
	{		
	return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapusdata($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('berkas');
	}
}
?>