<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assets extends CI_Controller {

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
            $this->load->model('asset_mdl');
        } 
        
	public function index()
	{
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'LINK_ADD_NEW'  => site_url('inventaris/assets/form'),
                'BODY_TITLE'    => 'Inventaris',
                'TITLE_PAGE'    => 'Assets',    
                'TABLE_NAME'    => 'asset_tables',
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
		'FIELDS'        => $this->asset_mdl->get_fields_list(),
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);            	
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_assets', $data, true);            	
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
	
	public function form($id=0)
	{
            $values = array();
            if (!empty($id)){
                $values =  $this->asset_mdl->get_detail($id);
            } 
            
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'BODY_TITLE'    => 'Inventaris',
                'FORM_ID'       => 'form_assets',
                'FORM_FIELDS'   => $this->asset_mdl->get_form_fields_list($values),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'LINK_ADD_NEW'  => site_url('penduduk/keluarga/form'),
            );
            
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/form/form', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);            	
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_assets_form', $data, true);            	
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}   
        
        function list_table()
        {
            $params = $this->input->post();
            $sEcho         = $params['sEcho'];
            $iDisplayLength = $params['iDisplayLength'];
            $iDisplayStart  = $params['iDisplayStart'];         
            $data_array = $this->asset_mdl->get_list($params);
           
            $nomor = $iDisplayStart + 1;
            $list_data = array();
            foreach($data_array['result'] as $row):
                $button = '<a href="#" class="label label-info btn-editable" data-id="'.$row->kode_asset.'">Edit</a> ';
                $button .= '<a href="#" class="label label-danger btn-removable" data-id="'.$row->kode_asset.'">Delete</a>';
                
                $list_data[] = array(
                    $nomor,
                    $row->kode_asset,
                    $row->nama_kategori,
                    $row->nama_asset,                    
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
	
	        
       function simpan($mode='')
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('kode_asset', 'Kode Asset', 'required');
            
            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'status'    => 0,
                    'message'   => 'Kesalahan: Data tidak dapat disimpan',
                    'result'    => validation_errors()
                );
            } else {    
                $params = $this->input->post();
                if ($mode == 'tambah'){
                    if ($this->asset_mdl->tambah($params)){
                        $data = array(
                            'status'    => 1,
                            'message'   => 'Berhasil: Data telah disimpan',
                            'log'       => $this->db->last_query()
                        );
                    }
                } else {
                    $id = $this->input->post('kode_asset');
                    if ($this->asset_mdl->ubah($params, $id)){
                        $data = array(
                            'status'    => 1,
                            'message'   => 'Berhasil: Data telah disimpan',
                            'log'       => $this->db->last_query()
                        );
                    }
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
                if ($this->asset_mdl->hapus($id)){
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
