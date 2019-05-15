<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otoritas extends CI_Controller {

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
            $this->load->model('otoritas_mdl');
        } 
        
	public function index()
	{
            
            $breadscrumb = array(
                array('label'=>'Otoritas Pengguna', 'link'=>site_url('pengguna/otoritas'), 'arrow'=>'<i class="fa fa-angle-right"></i>'),
                array('label'=>'Daftar', 'link'=>'#', 'arrow'=> '')
            );
            
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'TITLE_PAGE'    => 'SiADE :: Otoritas',
                'BODY_TITLE'    => 'Otoritas',
                'TABLE_NAME'    => 'otoritas_tables',
		'LINK_ADD_NEW'	=> site_url('pengguna/otoritas/form'),
                'FIELDS'        => $this->otoritas_mdl->get_fields_list(),
                'BREADSCRUMBS_LIST' => $breadscrumb,
            );
            
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);            	
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_otoritas', $data, true);            	
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        function list_table()
        {
            $params = $this->input->post();
            $sEcho         = $params['sEcho'];
            $iDisplayLength = $params['iDisplayLength'];
            $iDisplayStart  = $params['iDisplayStart'];         
            $data_array = $this->otoritas_mdl->get_list($params);
            
            $nomor = $iDisplayStart + 1;
            $list_data = array();
            foreach($data_array['result'] as $row):
                $button = '<a href="#" class="label label-info btn-editable" data-id="'.$row->otoritas_id.'">Edit</a> ';
                $button .= '<a href="#" class="label label-danger btn-removable" data-id="'.$row->otoritas_id.'">Delete</a>';
                
                $list_data[] = array(
                    $nomor,
                    $row->otoritas_id,
                    $row->group_pengguna_id,
                    $row->menu_id,
                    $button
                ); 
                $nomor++;
            endforeach;
            if (!empty($params)){
                $data = array(
                    'aaData'        => $list_data,
                    'sEcho'         => $sEcho,
                    'iTotalRecords' => $data_array['total'],
                    'iTotalDisplayRecords'  => $data_array['total'],
                );                
            }
            echo json_encode($data);
        } 
    
	public function form($id=0)
	{
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'TITLE_PAGE'    => 'SiADE :: Otoritas',
                'BODY_TITLE'    => 'Otoritas',
                'TABLE_NAME'    => 'otoritas_tables',
                'FORM_FIELDS'        => $this->otoritas_mdl->get_form_fields_list(),
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
