<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
        } 
        
	public function index()
	{
		redirect(site_url('login'), 'refresh');
	}
        
        public function login()
        {
            $data = array(
                'BASE_URL'  => base_url(),
                'SITE_URL'  => site_url(),
                'ERROR_SECTION' => ''
            );
            
            $username = $this->input->post('username', true);
            if(isset($username)){
                $username = $this->input->post('username', true);
                $password = $this->input->post('password', true);
                $data_array = $this->siade_auth->check_login($username, $password);
                if ($data_array['status']){
                    $this->session->set_userdata($data_array['data']);
                    redirect(site_url('dashboard'), 'refresh');
                } else {
                    $this->session->set_flashdata('status_error', $data_array['message']);
                    $data['MESSAGE']        = $data_array['message'];
                    $data['ERROR_SECTION']  = $this->parser->parse($this->themes.'/layout/notification/error', $data, true);
                }
            }
            $this->parser->parse($this->themes.'/layout/form/login', $data);
	}   
        
        public function logout()
        {
            $this->session->unset_userdata();
            redirect(site_url(), 'refresh');
        }        
        
}
