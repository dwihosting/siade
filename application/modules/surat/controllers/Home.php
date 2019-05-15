<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
            $this->load->model('surat_mdl');
            $this->load->model('master/agama_mdl');
        } 
        
	public function index($title)
	{
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'BODY_TITLE'    => 'Surat '.$title,
                'TABLE_NAME'    => 'surat_tables',
                'TITLE_PAGE'    => 'SiADE :: Surat',
                'LINK_ADD_NEW'  => site_url('surat/home/form/'.$title),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'FIELDS'        => $this->surat_mdl->get_fields_list(),
                'title'         => $title
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true); 
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_surat', $data, true);             
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        
        function list_table($title='')
        {
            $params         = $this->input->post();
            $sEcho          = @$params['sEcho'];
            $iDisplayLength = @$params['iDisplayLength'];
            $iDisplayStart  = @$params['iDisplayStart'];         
            $data_array = $this->surat_mdl->get_list($params);
            $list_data = array();
            $nomor = $iDisplayStart + 1;
            foreach($data_array['result'] as $row):
                $button = '<a href="#" class="label label-info btn-editable" data-id="'.$row->nomor_surat.'">Edit</a> ';
                $button .= '<a href="#" class="label label-danger btn-removable" data-id="'.$row->nomor_surat.'">Delete</a>';
                
                $list_data[] = array(
                    $nomor,
                    $row->tanggal_terbit,
                    $row->nomor_surat,                      
                    $row->jenis_surat,    
                    $row->surat_kategori_nama,
                    $row->perihal,  
                    $button
                ); 
                $nomor++;
            endforeach;
            
            if (!empty($params)){
                $data = array(
                    'aaData'                => $list_data,
                    'sEcho'                 => $sEcho,
                    'iTotalRecords'         => $data_array['total'],
                    'iTotalDisplayRecords'  => $data_array['total'],
                );                
            } else {
                $data = array(
                    'aaData'                => array(),
                    'sEcho'                 => 0,
                    'iTotalRecords'         => 0,
                    'iTotalDisplayRecords'  => 0,
                ); 
            }
            echo json_encode($data);
        }
        
        public function form($title='',$id=0)
	{
            $values = array();
            if (!empty($id)){
                $values =  $this->surat_mdl->get_detail($id);
            } 
            
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'BODY_TITLE'    => $title,
                'TITLE_PAGE'    => 'SiADE :: '.$title,
                'FORM_ID'       => 'form_surat',
                'FORM_FIELDS'        => $this->surat_mdl->get_form_fields_list($values),
                'title'         => $title
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/form/form', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true); 
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_surat_form', $data, true); 
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        function simpan($mode='',$title='')
        {
            $data = array(
                'status'    => 0,
                'message'   => 'Kesalahan: Data tidak dapat disimpan'
            );
            $params = $this->input->post();
            if ($mode == 'tambah'){
                $params['jenis_surat'] = 'KELUAR';
                //$params['jenis_surat'] = 'KELUAR';
                
                if ($this->surat_mdl->tambah($params)){
                    $data = array(
                        'status'    => 1,
                        'message'   => 'Berhasil: Data telah disimpan'
                    );
                }
            } else {
                $id = $this->input->post('nomor_surat');
                if ($this->surat_mdl->ubah($params, $id)){
                    $data = array(
                        'status'    => 1,
                        'message'   => 'Berhasil: Data telah disimpan',
                        'log'       => $this->db->last_query()
                    );
                }
            }
            echo json_encode($data);
        }
        
        function hapus($mode='',$title='')
        {
            $params = $this->input->post();
            $data = array(
                'status'    => 0,
                'message'   => 'Kesalahan: Data tidak dapat disimpan'
            );
            if (!empty($params)){
                $id = $params['id'];
                if ($this->surat_mdl->hapus($id)){
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
