<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller {
    
    function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            $this->load->model('desa_mdl');
        } 
        
	public function index()
	{
            
            if (!empty($_POST)){
                $params = $this->input->post();
                if ($this->desa_mdl->update('register', $params)){
                    redirect(site_url('konfigurasi/desa'), 'refresh');
                };                
            }            
            
            $breadscrumb = array(
                array('label'=>'Setting Desa', 'link'=>site_url('konfigurasi/desa'), 'arrow'=>'<i class="fa fa-angle-right"></i>'),
                array('label'=>'Form', 'link'=>'#', 'arrow'=> '')
            );
            
            $values = array(
                'kode_aktivasi'     => '',
                'nomor_registrasi'  => '',
                'tanggal_registrasi'=> '',
                'kode_propinsi'     => '',
                'kode_kabupaten'    => '',
                'kode_kecamatan'    => '',
                'kode_kelurahan'    => '',
                'nama_kelurahan'    => '',
                'alamat'            => '',
                'kode_pos'          => '',
                'telp'              => '',
                'fax'               => '',
                'nama_lurah'        => '',
            );
            
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'TITLE_PAGE'    => 'SiADE :: Dashboard Keluarga' ,   
                'BODY_TITLE'    => 'Setting Desa',
                'TITLE_PAGE'    => 'Setting Desa',
		'FORM_ID'       => 'form_setting_desa',
                'BREADSCRUMBS_LIST' => $breadscrumb,
		'FORM_FIELDS'       => $this->desa_mdl->get_form_fields_list($values),
                'LINK_ADD_NEW'      => site_url('konfigurasi/desa/form'),                
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = '';
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/form/form', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);			
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_desa', $data, true);
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        
		
}