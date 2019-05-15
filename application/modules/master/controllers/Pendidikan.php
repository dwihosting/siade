<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

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
            $this->load->model('pendidikan_mdl');
        } 
        
	public function index()
	{
            
            $breadscrumb = array(
                array('label'=>'Group Pengguna', 'link'=>site_url('master/pendidikan/form'), 'arrow'=>'<i class="fa fa-angle-right"></i>'),
                array('label'=>'Daftar', 'link'=>'#', 'arrow'=> '')
            );
            
            
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'BODY_TITLE'    => 'Pendidikan',
                'TABLE_NAME'    => 'pendidikan_tables',
                'TITLE_PAGE'    => 'SiADE :: Pendidikan',
                'LINK_ADD_NEW'  => site_url('master/pendidikan/form'),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'FIELDS'        => $this->pendidikan_mdl->get_fields_list(),
                'BREADSCRUMBS_LIST' => $breadscrumb
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);            	
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_pendidikan', $data, true);            	
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        function list_table()
        {
            $params = $this->input->post();
            $sEcho         = $params['sEcho'];
            $iDisplayLength = $params['iDisplayLength'];
            $iDisplayStart  = $params['iDisplayStart'];         
            $data_array = $this->pendidikan_mdl->get_list($params);
            $list_data = array();
            $nomor = $iDisplayStart + 1;
            foreach($data_array['result'] as $row):
                $button = '<a href="#" class="label label-info btn-editable" data-id="'.$row->kode_pendidikan.'">Edit</a> ';
                $button .= '<a href="#" class="label label-danger btn-removable" data-id="'.$row->kode_pendidikan.'">Delete</a>';
                
                $list_data[] = array(
                    $nomor,
                    $row->kode_pendidikan,
                    $row->nama_pendidikan,        
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
            
            $breadscrumb = array(
                array('label'=>'Pendidikan', 'link'=>site_url('master/pendidikan/form'), 'arrow'=>'<i class="fa fa-angle-right"></i>'),
                array('label'=>'Daftar', 'link'=>'#', 'arrow'=> '')
            );
            
            $values = array();
            if (!empty($id)){
                $values =  $this->pendidikan_mdl->get_detail($id);
            } 
            
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'BODY_TITLE'    => 'Pendidikan',
                'FORM_ID'       => 'form_pendidikan',
                'TITLE_PAGE'    => 'SiADE :: Pendidikan',
                'LINK_ADD_NEW'  => site_url('master/pendidikan/form'),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'FORM_FIELDS'        => $this->pendidikan_mdl->get_form_fields_list($values),
                'BREADSCRUMBS_LIST' => $breadscrumb
                
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
