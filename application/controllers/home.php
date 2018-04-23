<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function index()
	{
        $this->load->model('crud');
		$data['isi'] = $this->crud->get_konten();
		$this->load->view('home', $data);   
	}

	public function create()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
                
                $this->form_validation->set_rules('nama', 'Nama File', 'required', array('required' => ' %s aaaaaa'));
                $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
                $this->form_validation->set_rules('defile', 'Isi File', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('tambah');
                }
                else
                {
                        $this->load->model('crud');
						$data = array();

						if ($this->input->post('submit')) {
							$upload = $this->crud->upload();

						if ($upload['result'] == 'success') {
							$this->crud->insert($upload);
							redirect('home');
							}else{
							$data['message'] = $upload['error'];
							}
						}

							$this->load->view('tambah', $data);
              	 }
	}

	public function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->crud->edit_data($where,'berkas')->result();
		$this->load->view('edit',$data);
	}

	public function update(){
	
    $this->load->model('crud');
	$id = $this->input->post('id');
	$nama = $this->input->post('nama');
	$deskripsi = $this->input->post('deskripsi');
	$tgl = $this->input->post('tgl');
	$file = $this->input->post('isi_file');

	$data = array(
		'nama_file' => $nama,
		'deskripsi' => $deskripsi,
		'tgl_file' => $tgl,
		'isi_file' => $file
	);
 
	$where = array(
		'id' => $id
	);
 
	$this->crud->update_data($where,$data,'berkas');
	redirect('home');
	}

	public function hapus($id)
	{
		$id = $this->uri->segment(3);
		$this->crud->hapusdata($id);
		redirect('home');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */