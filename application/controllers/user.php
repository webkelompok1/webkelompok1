<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
				
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('category_model');
	}

	public function create_user()
	{
		$data['categories'] = $this->category_model->get_all_categories();
		$data['kategori'] = $this->crud->get_kategori();
		$this->load->helper(array('form', 'url'));

                $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
                $this->form_validation->set_rules('password', 'password', 'required');
                $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]');
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('level', 'Level', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('tambah_user', $data);
                } else {
                        $this->load->model('crud');
						$data = array();

						if ($this->input->post('submit')) {
							$enc_password = md5($this->input->post('password'));
							$this->user_model->insert_user($enc_password);
							redirect('home');
						}
				}
	}

	// Log in user
	public function login(){

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('login');
		} else {
			
	// Get username
	$username = $this->input->post('username');
	// Get & encrypt password
	$password = md5($this->input->post('password'));

	// Login user
	$id = $this->user_model->login($username, $password);

	if($id){
		// Buat session
		$user_data = array(
			'id' => $id,
			'username' => $username,
			'logged_in' => true,
			'level' => $this->user_model->get_user_level($user_id)	
		);

		$this->session->set_userdata($user_data);

		// Set message
		$this->session->set_flashdata('user_loggedin', 'Anda sudah login');

		redirect('home');
	} else {
		// Set message
		$this->session->set_flashdata('login_failed', 'Login invalid');

		redirect('user/login');
	}		
		}
	}

	// Log user out
	public function logout(){
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

		redirect('user/login');
	}

	function dashboard()
	{
		// Must login
		if(!$this->session->userdata('logged_in')) 
			redirect('login');

		$user_id = $this->session->userdata('user_id');

		// Dapatkan detail dari User
		$data['user'] = $this->user_model->get_user_details( $user_id );

		// Load view
		$this->load->view('dashboard', $data, FALSE);
	}
}