<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {
    
    function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            $this->load->model('All_negara');
            $this->load->model('All_propinsi');
            $this->load->model('All_kabupaten');
            $this->load->model('All_agama');
            $this->load->model('All_pekerjaan');
            $this->load->model('All_kartukeluarga');
            
            $this->load->model('keluarga_mdl');
        } 
        
	public function index()
	{
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'TITLE_PAGE'    => 'SiADE :: Dashboard Keluarga' ,   
                'BODY_TITLE'    => 'Keluarga',
                'TITLE_PAGE'    => 'Keluarga',
		'TABLE_NAME'    => 'keluarga_tables',
		'FIELDS'        => $this->keluarga_mdl->get_fields_list(),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'LINK_ADD_NEW'  => site_url('penduduk/keluarga/form'),                
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_keluarga', $data, true);			
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        function list_table()
        {
            $params = $this->input->post();
            $sEcho         = $params['sEcho'];
            $iDisplayLength = $params['iDisplayLength'];
            $iDisplayStart  = $params['iDisplayStart'];         
            $data_array = $this->keluarga_mdl->get_list($params);
           
            $nomor = $iDisplayStart + 1;
			$list_data = array();
            foreach($data_array['result'] as $row):
                $button = '<a href="#" class="label label-info btn-editable" data-id="'.$row->nik.'">Edit</a> ';
                $button .= '<a href="#" class="label label-danger btn-removable" data-id="'.$row->nik.'">Delete</a>';
                if ($row->jenis_kelamin == 'LAKI-LAKI') {
                    $jk = 'L';
                } else {
                    $jk = 'P'; 
                }
                $list_data[] = array(
                    $nomor,
                    $row->nik,
                    $row->nama_lengkap,
                    $jk,  
                    $row->tanggal_lahir,  
                    $row->kode_agama,  
                    $row->kode_pekerjaan,
                    $row->kewarganegaraan,
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
		
        function form($id=0)
        {
            $values = array();
            if (!empty($id)){
                $values =  $this->keluarga_mdl->get_detail($id);
            } 
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'TITLE_PAGE'    => 'SiADE :: Dashboard Keluarga' ,   
                'BODY_TITLE'    => 'Keluarga',
                'TITLE_PAGE'    => 'Keluarga',
		'FORM_ID'    	=> 'form_keluarga',
		'FORM_FIELDS'   => $this->keluarga_mdl->get_form_fields_list($values),
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
			$data['SCRIPT_SECTION']     = $this->parser->parse('js/script_form_keluarga', $data, true);			
                        
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
        }        
		
	function simpan($mode='')
	{
		$params = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
                
		if ($this->form_validation->run() == FALSE)
                {
                    $data = array(
                        'status'	=> 0,
                        'message'	=> validation_errors(),
                        'result'        => array()
                    );
                }
                else
                {
                    $kondisi = false;
                    $params = $this->input->post();
                    if ($mode == 'tambah'){
                        if ( $this->keluarga_mdl->tambah($params) ){
                            $kondisi = true;
                        };
                    }

                    if ($mode == 'update'){
                        $id = $this->input->post($this->keluarga_mdl->table['keyfield']);
                        if ( $this->keluarga_mdl->ubah($params,$id) ){
                            $kondisi = true;
                        };
                    }
                    
                    if ($kondisi){
                        $data = array(
                            'status'	=> 1,
                            'message'	=> "Berhasil : Data Anda telah disimpan",
                            'log'       => $this->db->last_query()
                        );
                    } else {
                        $data = array(
                            'status'	=> 2,
                            'message'	=> "Gagal : Data tidak dapat disimpan",
                            'log'       => $this->db->last_query()
                        );
                    }
                }		
		echo json_encode($data);
	}	
	
	function hapus($id)
	{
            if ($this->keluarga_mdl->hapus($id)){
		$data = array(
                    'status'	=> 1,
                    'message'	=> "Berhasil : Data Anda telah dihapus"
		);
            } else {
                $data = array(
                    'status'	=> 0,
                    'message'	=> "Gagal : Data tidak berhasil dihapus"
		);
            }    
            echo json_encode($data);
	}
}