<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propinsi extends CI_Controller {

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
            $this->load->model('propinsi_mdl');
        } 
        
	public function index()
	{
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'BODY_TITLE'    => 'Dashboard',
                'TITLE_PAGE'    => 'SiADE :: Propinsi',
                'TABLE_NAME'    => 'propinsi_tables',
                'LINK_ADD_NEW'  => site_url('master/propinsi/form'),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'FIELDS'        => $this->propinsi_mdl->get_fields_list()
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);            	
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_propinsi', $data, true);            	
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        function list_table()
        {
            $params = $this->input->post();
            $sEcho         = $params['sEcho'];
            $iDisplayLength = $params['iDisplayLength'];
            $iDisplayStart  = $params['iDisplayStart'];         
            $data_array = $this->propinsi_mdl->get_list($params);
           
            $nomor = $iDisplayStart + 1;
            foreach($data_array['result'] as $row):
                $button = '<a href="#" class="label label-info btn-editable" data-id="'.$row->kode_propinsi.'">Edit</a> ';
                $button .= '<a href="#" class="label label-danger btn-removable" data-id="'.$row->kode_propinsi.'">Delete</a>';
                
                $list_data[] = array(
                    $nomor,
                    $row->kode_propinsi,
                    $row->nama_propinsi,        
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
            $values = array();
            if ($id>0){
                $values =  $this->propinsi_mdl->get_detail($id);
            } 
            
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'BODY_TITLE'    => 'Dashboard',
                'TITLE_PAGE'    => 'SiADE :: Propinsi',
                'TABLE_NAME'    => 'propinsi_tables',
                'FORM_ID'       => 'form_propinsi',
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'LINK_ADD_NEW'  => site_url('master/propinsi/form'),
                'FORM_FIELDS'   => $this->propinsi_mdl->get_form_fields_list($values)
            );
            
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/form/form', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true); 
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_propinsi_form', $data, true); 
                        
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        function simpan($mode)
        {
            $data = array(
                'status'    => 0,
                'message'   => 'Kesalahan: Data tidak dapat disimpan'
            );
            $params = $this->input->post();
            if ($mode == 'tambah'){
                if ($this->propinsi_mdl->tambah($params)){
                    $data = array(
                        'status'    => 1,
                        'message'   => 'Berhasil: Data telah disimpan'
                    );
                }
            } else {
                $id = $this->input->post('kode_propinsi');
                if ($this->propinsi_mdl->ubah($params, $id)){
                    $data = array(
                        'status'    => 1,
                        'message'   => 'Berhasil: Data telah disimpan',
                        'log'       => $this->db->last_query()
                    );
                }
            }
            echo json_encode($data);
        }
        
        function hapus()
        {
            $params = $this->input->post();
            $data = array(
                'status'    => 0,
                'message'   => 'Kesalahan: Data tidak dapat disimpan'
            );
            if (!empty($params)){
                $id = $params['id'];
                if ($this->propinsi_mdl->hapus($id)){
                    $data = array(
                        'status'    => 1,
                        'message'   => 'Berhasil: Data telah dihapus',
                        'log'       => $this->db->last_query()
                    );
                };
            }
            echo json_encode($data);
        }
}
