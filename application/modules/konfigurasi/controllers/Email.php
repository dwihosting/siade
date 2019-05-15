<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
    
    function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
	$this->load->model('email_mdl');
        } 
        
	public function index()
	{
            if (!empty($_POST)){
                $params = $this->input->post();
                if ($this->email_mdl->update('email', $params)){
                    redirect(site_url('konfigurasi/email'), 'refresh');
                };                
            }            
            
            $breadscrumb = array(
                array('label'=>'Setting Email', 'link'=>site_url('konfigurasi/email'), 'arrow'=>'<i class="fa fa-angle-right"></i>'),
                array('label'=>'Form', 'link'=>'#', 'arrow'=> '')
            );
                        
            $values = array(
                'email_account',
                'password',
                'protocol',
                'port' , 
            );
            
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'TITLE_PAGE'    => 'SiADE :: Dashboard Keluarga' ,   
                'BODY_TITLE'    => 'Keluarga',
                'TITLE_PAGE'    => 'Keluarga',		
                'FORM_ID'       => 'form_setting_desa',
                'BREADSCRUMBS_LIST' => $breadscrumb,
                'FORM_FIELDS'        => $this->email_mdl->get_form_fields_list($values),
                'LINK_ADD_NEW'  => site_url('konfigurasi/email/form'),                
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/form/form', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);
				
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        
		
}