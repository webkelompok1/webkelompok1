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
	public function __construct()
  	{
        parent::__construct();
 
        // load Pagination library
        $this->load->library('pagination','form_validation');
         
        // load URL helper
        $this->load->helper('url');
        $this->load->model('crud');
    }

	public function index()
	{
        $this->load->model('crud');
		$params = array();
        $limit_per_page = 1;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->crud->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["results"] = $this->crud->get_konten($limit_per_page, $start_index);
            $params['kategori'] = $this->crud->get_kategori();

            $config['base_url'] = base_url() . 'home/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            $config['full_tag_open'] 	= '<nav><ul class="pagination justify-content-center">';
			$config['full_tag_close'] 	= '</ul></nav>';

			$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] 	= '</span></li>';

			$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';

			$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';

			$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close'] 	= '</span></li>';

			$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';

			$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close'] 	= '</span></li>';

            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
         
        $this->load->view('home', $params);
	}

	public function custom()
    {
        // init params
        $params = array();
        $limit_per_page = 2;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->crud->get_total();
     
        if ($total_records > 0)
        {
            // get current page records
            $params["results"] = $this->crud->get_konten($limit_per_page, $page*$limit_per_page);
                 
            $config['base_url'] = base_url() . 'home/custom';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';
             
            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';
 
            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';
 
            $config['cur_tag_open'] = '<span class="curlink">';
            $config['cur_tag_close'] = '</span>';
 
            $config['num_tag_open'] = '<span class="numlink">';
            $config['num_tag_close'] = '</span>';
             
            $this->pagination->initialize($config);
                 
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
     
        $this->load->view('home', $params);
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
		if(!$this->session->userdata('logged_in')){
            redirect('user/login');
        }
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get_all_categories();
		$data['kategori'] = $this->crud->get_kategori();
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
                
                $this->form_validation->set_rules('nama', 'Nama File', 'required', array('required' => ' %s aaaaaa'));
                $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
                $this->form_validation->set_rules('defile', 'Isi File', 'required');
                $this->form_validation->set_rules('cat_id', 'Kategori', 'required');
                $this->form_validation->set_rules('waktu', 'Waktu', 'required');
                $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
                $this->form_validation->set_rules('jenis_tiket', 'Jenis Tiket', 'required');
                $this->form_validation->set_rules('harga', 'Harga', 'required');
                $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

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

	/*public function create_tiket($id)
	{
		$where = array('id' => $id);
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get_all_categories();
		$data['kategori'] = $this->crud->get_kategori();
		$data['user'] = $this->crud->edit_data($where,'event')->result();
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
                
                $this->form_validation->set_rules('kategori', 'Kategori', 'required', array('required' => ' %s aaaaaa'));
                $this->form_validation->set_rules('harga', 'Harga', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('tambah_tiket',$data);
                }
                        $this->load->model('crud');
						$data = array();

						if ($this->input->post('submit')) {
							$this->crud->insert_tiket();
							redirect('home');
						}
	}*/

	public function create_pendaftar($id)
	{
		$where = array('id' => $id);
		$this->load->model('category_model');
		$data['user'] = $this->crud->edit_data($where,'event')->result();
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
                
                $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => ' %s aaaaaa'));
                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                $this->form_validation->set_rules('no_telp', 'No_Telp', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('tambah_pendaftar',$data);
                }
                        $this->load->model('crud');
						$data = array();

						if ($this->input->post('submit')) {
							$this->crud->insert_pendaftar();
							redirect('home');
						}
	}

	public function edit($id){
		$where = array('id' => $id);
		$this->load->model('category_model');
		$data['user'] = $this->crud->edit_data($where,'event')->result();
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
	$waktu = $this->input->post('waktu');
	$jenis_tiket = $this->input->post('jenis_tiket');
	$harga = $this->input->post('harga');
	$lokasi = $this->input->post('lokasi');
	$cat_id = $this->input->post('cat_id');
	//$file = $this->input->post('isi_file');

	if($post_image=='' && $cat_id=='') {
		$data = array(
		'nama_event' => $nama,
		'deskripsi' => $deskripsi,
		'tgl_event' => $tgl,
		'waktu' => $waktu,
		'jenis_tiket' => $jenis_tiket,
		'harga' => $harga,
		'lokasi' => $lokasi
		);
	} else {
		$data = array(
		'nama_event' => $nama,
		'deskripsi' => $deskripsi,
		'tgl_event' => $tgl,
		'waktu' => $waktu,
		'gambar' => $post_image,
		'jenis_tiket' => $jenis_tiket,
		'harga' => $harga,
		'lokasi' => $lokasi,
		'cat_id' => $cat_id
		);
	}
	//if($file==''){
	//	unset($data['isi_file']);
	//}
 	
	$where = array(
		'id' => $id
	);
 
	$this->crud->update_data($where,$data,'event');
	redirect('home');
	}

	public function edit_pendaftar($id){
		$this->load->model('crud');
		$where = array('id' => $id);
		$data['user'] = $this->crud->edit_data($where,'pendaftar')->result();
		$this->load->view('edit_pendaftar',$data);
	}

	public function update_pendaftar(){
	
    $this->load->model('crud');
	$id = $this->input->post('id_event');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$no_telp = $this->input->post('no_telp');
	$email = $this->input->post('email');
 
	$data = array(
		'nama' => $nama,
		'alamat' => $alamat,
		'no_telp' => $no_telp,
		'email' => $email
	);
 
	$where = array(
		'id' => $id
	);
 
	$this->crud->update_data($where,$data,'pendaftar');
	redirect('home');
	}

	public function hapus($id)
	{
		$this->crud->hapusdata($id);
		redirect('home');
	}

	public function hapus_pendaftar($id)
	{
		$this->crud->hapusdatapendaftar($id);
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

	/*public function download($file){
            //load download helper
            $this->load->helper('download');
            $name = $file;
            $data = file_get_contents('upload/'.$file);
            force_download($name, $data);
            	redirect('home','refresh');
    }*/

    public function table_event()
	{
		$data2['event'] = $this->crud->get_dataevent();
		$this->load->view('table_event', $data2);
	}
	public function table_pendaftar()
	{
		$data2['pendaftar'] = $this->crud->get_datapendaftar();
		$this->load->view('table_pendaftar', $data2);
	}
	public function table_user()
	{
		$data2['user'] = $this->crud->get_datauser();
		$this->load->view('table_user', $data2);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */