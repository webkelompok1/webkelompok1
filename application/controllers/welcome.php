<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
                 $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                $this->form_validation->set_rules('username', 'Username', 'required');
                //$this->form_validation->set_rules('password', 'Password', 'required',
                //        array('required' => 'You must provide a %s.')
                //);
                //$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
               // $this->form_validation->set_rules('email', 'Email', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('coba');
                }
                else
                {
                        echo 'horrraaaayyy';
                }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */