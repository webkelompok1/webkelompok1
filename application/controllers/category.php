<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
		/*$this->load->model('category_model');

		$data['categories'] = $this->category_model->get_all_categories();

		$this->load->view('cat_view', $data);*/
	}

	public function create()
	{
		$this->load->model('category_model');

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

       	$data['kategori'] = $this->crud->get_kategori();

                $this->form_validation->set_rules('cat_name', 'Nama Kategori', 'required|is_unique[categories.cat_name]');

         if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('cat_create',$data);
                } else {

		$post_data = array(
	    	    'id' => '',
	    	   	'cat_name' => $this->input->post('cat_name')
	    	);

	    	// Jika tidak ada error upload gambar, maka kita insert ke database via model Blog 
	    	if( empty($data['upload_error']) ) {
		        $this->category_model->create_category($post_data);
		        $this->load->view('cat_create', $post_data);
	    	}
	    }
	}

	public function hapus($id)
	{
		$this->load->model('category_model');
		$id = $this->uri->segment(3);
		$this->category_model->hapusdata($id);
		redirect('home/table_kategori');
	}

	public function edit($id){
		$this->load->model('category_model');
		$where = array('id' => $id);
		$data['kategori'] = $this->crud->get_kategori();
		$data['user'] = $this->category_model->edit_data($where,'categories')->result();
		$this->load->view('cat_edit',$data);
	}

	public function update(){
	
    $this->load->model('category_model');
	$id = $this->input->post('id');
	$title = $this->input->post('cat_name');
 
	$data = array(
		'cat_name' => $title
	);
 
	$where = array(
		'id' => $id
	);
 
	$this->category_model->update_data($where,$data,'categories');
	redirect('home/table_kategori');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>