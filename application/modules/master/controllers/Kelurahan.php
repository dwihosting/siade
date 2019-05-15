<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends CI_Controller {

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
            $this->load->model('kelurahan_mdl');
        } 
        
	public function index()
	{
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'BODY_TITLE'    => 'Kelurahan',
                'TABLE_NAME'    => 'kelurahan_tables',
                'TITLE_PAGE'    => 'SiADE :: Kelurahan',
                'LINK_ADD_NEW'  => site_url('master/kelurahan/form'),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'FIELDS'        => $this->kelurahan_mdl->get_fields_list()
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);            	
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_kelurahan', $data, true);            	
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        function list_table()
        {
            $params = $this->input->post();
            $sEcho         = $params['sEcho'];
            $iDisplayLength = $params['iDisplayLength'];
            $iDisplayStart  = $params['iDisplayStart'];         
            $data_array = $this->kelurahan_mdl->get_list($params);
           
            $nomor = $iDisplayStart + 1;
            foreach($data_array['result'] as $row):
                $button = '<a href="#" class="label label-info btn-editable" data-id="'.$row->kode_kelurahan.'">Edit</a> ';
                $button .= '<a href="#" class="label label-danger btn-removable" data-id="'.$row->kode_kelurahan.'">Delete</a>';
                
                $list_data[] = array(
                    $nomor,
                    $row->nama_propinsi,
                    $row->nama_kabupaten,
                    $row->nama_kecamatan,                    
                    $row->kode_kelurahan,
                    $row->nama_kelurahan,        
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
                'BODY_TITLE'    => 'Kelurahan',
                'TABLE_NAME'    => 'kelurahan_tables',
                'TITLE_PAGE'    => 'SiADE :: Kelurahan',
                'LINK_ADD_NEW'  => site_url('master/kelurahan/form'),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'FORM_FIELDS'        => $this->kelurahan_mdl->get_form_fields_list()
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
        
        function get_kelurahan()
        {
            $kode_kecamatan = $this->input->post('kode_kecamatan');
            $query = $this->kelurahan_mdl->get_list_filter($kode_kecamatan);
            $result = $query;
            foreach($result as $row):
                
                $data[] = array(
                    'kode_kelurahan' => $row->kode_kelurahan,
                    'nama_kelurahan' => $row->nama_kelurahan                   
                );
            endforeach;
            echo json_encode($data);
        }
}
