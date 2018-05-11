<?php
class Crud extends CI_Model {

	public function __construct()
	{
		
	}

	public function get_konten()
	{
		$query = $this->db->get('berkas');
		return $query->result();
	}

	public function get_kategori()
	{
		$query = $this->db->get('categories');
		return $query->result();
	}

	public function get_kategori_id($category)
	{
		$query = $this->db->query('select * from berkas as b join categories as c on b.cat_id=c.id where b.cat_id ='.$category);
		return $query->result();
	}

	public function upload()
	{
		$config['upload_path'] 		= './upload/';
		$config['allowed_types'] 	= '*';
		$config['max_size']  		= '120000000';
		$config['remove_space'] 	= TRUE;
		$config['overwrite']		= TRUE;
		
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
			'tgl_file' => $this->input->post('tgl'),
			'waktu' => $this->input->post('waktu'),
			'isi_file' => $upload['file']['file_name'],
			'jenis_tiket' => $this->input->post('jenis_tiket'),
			'harga' => $this->input->post('harga'),
			'lokasi' => $this->input->post('lokasi'),
			'cat_id' => $this->input->post('cat_id')
		);

		$this->db->insert('berkas', $data);
	}

	public function insert_tiket()
	{
		$data = array(
			'id' => '',
			'kategori' => $this->input->post('kategori'),
			'harga' => $this->input->post('harga'),
			'id_event' => $this->input->post('id_event')
		);

		$this->db->insert('tiket', $data);
	}

	public function insert_pendaftar()
	{
		$data = array(
			'id' => '',
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
			'jenis_tiket' => $this->input->post('jenis_tiket'),
			'harga' => $this->input->post('harga'),
			'id_event' => $this->input->post('id_event')
		);

		$this->db->insert('pendaftar', $data);
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
		$row = $this->db->where('id',$id)->get('berkas')->row();

		$this->db->where('id', $id);

		unlink('upload/'.$row->isi_file);

		$this->db->delete('berkas', array('id' => $id));
	}

	public function cari()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from berkas where nama_file like '%$cari%' ");
		return $data->result();
	}
}
?>