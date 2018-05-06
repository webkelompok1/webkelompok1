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
		$data['kategori'] = $this->crud->get_kategori();
		$this->load->view('home', $data);   
	}

	public function category($category)
	{
		$this->load->model('crud');
		$data['detail'] = $this->crud->get_kategori_id($category);
		$data['kategori'] = $this->crud->get_kategori();
		$this->load->view('result_kategori',$data);
	}

	public function create()
	{
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get_all_categories();
		$data['kategori'] = $this->crud->get_kategori();
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
                
                $this->form_validation->set_rules('nama', 'Nama File', 'required', array('required' => ' %s aaaaaa'));
                $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
                $this->form_validation->set_rules('defile', 'Isi File', 'required');
                $this->form_validation->set_rules('cat_id', 'Kategori', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('tambah',$data);
                }
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
              	 
	}

	public function edit($id){
		$where = array('id' => $id);
		$this->load->model('category_model');
		$data['user'] = $this->crud->edit_data($where,'berkas')->result();
		$data['kategori'] = $this->crud->get_kategori();
		$data['categories'] = $this->category_model->get_all_categories();
		$this->load->view('edit',$data);
	}

	public function update(){

    $this->load->model('crud');

	if ( isset($_FILES['isi_file']) && $_FILES['isi_file']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = './upload/';
    	        $config['allowed_types']        = '*';
    	        $config['max_size']             = 200000000;
    	        $config['overwrite']			= TRUE;
    	        $config['remove_space']  		= TRUE;

    	        // Load library upload
    	        $this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('isi_file'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();

    	        	$post_image = '';

    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
    	            $this->load->view('edit', $data); 

    	        } else {

    	        	// Hapus file image yang lama jika ada
    	        	if( !empty($old_image) ) {
    	        		if ( file_exists( './upload/'.$old_image ) ){
    	        		    unlink( './upload/'.$old_image );
    	        		} else {
    	        		    echo 'File tidak ditemukan.';
    	        		}
    	        	}

    	        	// Simpan nama file-nya jika berhasil diupload
    	            $img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];
    	        	
    	        }
    		} else {

    			// User tidak upload gambar, jadi kita kosongkan field ini, atau jika sudah ada, gunakan image sebelumnya
    			if(isset($_FILES['isi_file']) == ''){
					unset($data['isi_file']);
				}

    		}

	$id = $this->input->post('id');
	$nama = $this->input->post('nama');
	$deskripsi = $this->input->post('deskripsi');
	$tgl = $this->input->post('tgl');
	$cat_id = $this->input->post('cat_id');
	//$file = $this->input->post('isi_file');

	if($post_image=='' && $cat_id=='') {
		$data = array(
		'nama_file' => $nama,
		'deskripsi' => $deskripsi,
		'tgl_file' => $tgl
		);
	} else {
		$data = array(
		'nama_file' => $nama,
		'deskripsi' => $deskripsi,
		'tgl_file' => $tgl,
		'isi_file' => $post_image,
		'cat_id' => $cat_id
		);
	}
	//if($file==''){
	//	unset($data['isi_file']);
	//}
 	
	$where = array(
		'id' => $id
	);
 
	$this->crud->update_data($where,$data,'berkas');
	redirect('home');
	}

	public function hapus($id)
	{
		$this->crud->hapusdata($id);
		redirect('home');
	}

	public function cari() 
	{
		$this->load->view('search');
	}
 
	public function hasil()
	{
		$data2['kategori'] = $this->crud->get_kategori();
		$data2['cari'] = $this->crud->cari();
		$this->load->view('result', $data2);
	}

	public function download($file){
            //load download helper
            $this->load->helper('download');
            $name = $file;
            $data = file_get_contents('upload/'.$file);
            force_download($name, $data);
            	redirect('home','refresh');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */