<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keterangan_miskin extends CI_Controller {
    
    function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
        } 
        
	public function index()
	{
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'TITLE_PAGE'    => 'SiADE :: Dashboard Surat' ,   
                'BODY_TITLE'    => 'Surat Keterangan Miskin',
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/content/content', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);            	
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
}