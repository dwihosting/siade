<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

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
            $this->load->model('akun_mdl');
            $this->load->model('profile_mdl');
        } 
        
	public function index()
	{
            $breadscrumb = array(
                array('label'=>'Pengguna', 'link'=>site_url('konfigurasi/desa'), 'arrow'=>'<i class="fa fa-angle-right"></i>'),
                array('label'=>'Form', 'link'=>'#', 'arrow'=> '')
            );
            
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'TITLE_PAGE'    => 'SiADE :: Data Pengguna',
                'BODY_TITLE'    => 'Pengguna',
                'TABLE_TITLE'   => 'Pengguna',
                'TABLE_NAME'    => 'akun_tables',
                'FIELDS'        => $this->akun_mdl->get_fields_list(),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'LINK_ADD_NEW'  => site_url('pengguna/akun/form'),
                'BREADSCRUMBS_LIST' => $breadscrumb,
            );
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_pengguna', $data, true);
            
            $this->parser->parse($this->themes.'/layout/main_layout', $data);
	}
        
        function list_table()
        {
            $params = $this->input->post();
            $sEcho         = $params['sEcho'];
            $iDisplayLength = $params['iDisplayLength'];
            $iDisplayStart  = $params['iDisplayStart'];         
            $data_array = $this->akun_mdl->get_list($params);
           
            $nomor = $iDisplayStart + 1;
            foreach($data_array['result'] as $row):
                $button = '<a href="#" class="label label-info btn-editable" data-id="'.$row->kode_pengguna.'">Edit</a> ';
                $button .= '<a href="#" class="label label-danger btn-removable" data-id="'.$row->kode_pengguna.'">Delete</a>';
                
                if ($row->is_aktif){
                    $status = '<a href="#" class="label label-success btn-aktif" data-id="'.$row->kode_pengguna.'">Aktif</a> ';
                } else {
                    $status = '<a href="#" class="label label-danger btn-inaktif" data-id="'.$row->kode_pengguna.'">Tidak Aktif</a>';                
                }
                
                $list_data[] = array(
                    $nomor,
                    $row->group_nama,
                    $row->username,
                    'xxxxxxxxxxxxxx',
                    $status,                    
                    $row->tanggal_buat,
                    $row->tanggal_terakhir_login,
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
      
        public function form($id='')
	{
            echo md5('s4yuRA@sem');
            
            $values = array();
            if (!empty($id)){
                $values =  $this->akun_mdl->get_detail($id);
                $values['password'] = '';
            } 
            
            $breadscrumb = array(
                array('label'=>'Pengguna', 'link'=>site_url('konfigurasi/desa'), 'arrow'=>'<i class="fa fa-angle-right"></i>'),
                array('label'=>'Form', 'link'=>'#', 'arrow'=> '')
            );
            
            $data = array(
                'BASE_URL'      => base_url(),
                'SITE_URL'      => site_url(),
                'BODY_TITLE'    => 'Pengguna',
                'FORM_ID'       => 'form_pengguna',
                'TITLE_PAGE'    => 'SiADE :: Pengguna',
                'LINK_ADD_NEW'  => site_url('pengguna/akun/form'),
                'FULLNAME'      => $this->session->userdata('nama_lengkap'),
                'FORM_FIELDS'       => $this->akun_mdl->get_form_fields_list($values),
                'BREADSCRUMBS_LIST' => $breadscrumb,
                'id'                => $id
            );
            
            if (!empty($id)){
                unset($data['FORM_FIELDS'][1]);
                unset($data['FORM_FIELDS'][2]);
                unset($data['FORM_FIELDS'][3]);
                unset($data['FORM_FIELDS'][4]);
            }
            
            $data['HEADER_SECTION']     = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
            $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/menu/sidebar', $data, true);
            
            $data['MODAL_SECTION']          = $this->parser->parse($this->themes.'/layout/modal/modal_form', $data, true);
            $data['BREADSCRUMB_SECTION']    = $this->parser->parse($this->themes.'/layout/header/breadscrumb', $data, true);
            $data['CONTENT_SECTION']        = $this->parser->parse($this->themes.'/layout/form/form', $data, true);
            
            $data['BODY_SECTION']       .= $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);            
            $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true); 
            $data['SCRIPT_SECTION']     = $this->parser->parse('js/script_pengguna_form', $data, true); 
            
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
                // find kode urut
                $kode_urut = $this->akun_mdl->get_kodeurut($params);                
                $params['tanggal_buat'] = time();
                $kode_kelurahan = $params['kode_kelurahan'];
                unset($params['kode_propinsi']);  
                unset($params['kode_kabupaten']);  
                unset($params['kode_kecamatan']);  
                unset($params['kode_kelurahan']);  
                $params['kode_pengguna'] = $kode_urut;
                
                if ($this->akun_mdl->tambah($params)){
                    // add to profile
                    $params_profile['kode_pengguna'] = $kode_urut;
                    $params_profile['kode_kelurahan'] = $kode_kelurahan;
                    //$this->profile_mdl->tambah($params_profile);
                    
                    $data = array(
                        'status'    => 1,
                        'message'   => 'Berhasil: Data telah disimpan'
                    );
                }
            } else {
                $id = $this->input->post('id');
                
                unset($params['id']);                      
                if (empty($params['password'])){
                    unset($params['password']);                      
                } 
                $params['tanggal_ubah'] = time();
                if ($this->akun_mdl->ubah($params, $id)){
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
                if ($this->akun_mdl->hapus($id)){
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
