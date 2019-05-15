<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
			$this->load->model('kk_mdl');
        } 
        
	public function index()
	{
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'TITLE_PAGE'    => 'SiADE :: Penduduk' ,   
                'BODY_TITLE'    => 'Penduduk',
                'TITLE_PAGE'    => 'Penduduk',
		'TABLE_NAME'    => 'penduduk_tables',
		'FIELDS'        => $this->kk_mdl->get_fields_list(),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'LINK_ADD_NEW'  => site_url('penduduk/home/form'),                
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_kk', $data, true);			
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        function list_table()
        {
            $params = $this->input->post();
            $sEcho         = $params['sEcho'];
            $iDisplayLength = $params['iDisplayLength'];
            $iDisplayStart  = $params['iDisplayStart'];         
            $data_array = $this->kk_mdl->get_list($params);
           
            $nomor = $iDisplayStart + 1;
			$list_data = array();
            foreach($data_array['result'] as $row):
                $button = '<a href="#" class="label label-info btn-editable" data-id="'.$row->nomor_kk.'">Edit</a> ';
                $button .= '<a href="#" class="label label-danger btn-removable" data-id="'.$row->nomor_kk.'">Delete</a>';
                
                $list_data[] = array(
                    $nomor,
                    $row->nomor_kk,
                    $row->nama_kk,
                    $row->tanggal_terbit, 
                    $row->kode_kelurahan,
                    $row->kode_pos,                    
                    $row->pejabat_ttd,                    
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
            if (!empty($id)){
                $values =  $this->kk_mdl->get_detail($id);
            }
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'TITLE_PAGE'    => 'SiADE :: Penduduk' ,   
                'BODY_TITLE'    => 'Penduduk',
                'TITLE_PAGE'    => 'Penduduk',
		'FORM_ID'       => 'form_penduduk',
		'FORM_FIELDS'   => $this->kk_mdl->get_form_fields_list($values),
                'LINK_ADD_NEW'  => site_url('penduduk/home/form'), 
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/form/form', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_form_kk', $data, true);			
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        function simpan($mode='')
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nomor_kk', 'Nomor Kartu Keluarga', 'required');
                
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
                        if ( $this->kk_mdl->tambah($params) ){
                            $kondisi = true;
                        };
                    }

                    if ($mode == 'update'){
                        $id = $this->input->post($this->kk_mdl->table['keyfield']);
                        if ( $this->kk_mdl->ubah($params,$id) ){
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