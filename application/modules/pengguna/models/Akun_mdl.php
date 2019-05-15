<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $propinsilist   = $this->all_propinsi->get_option();
        $kabupatenlist  = array();
        $kecamatanlist  = array();
        $kelurahanlist  = array();
        $grouplist      = $this->all_group_pengguna->get_option();
        
        $this->table = array(
            'name'    => 'pengguna',
            'coloum'    => array(
                'kode_pengguna'     => array('label'=>'Kode Pengguna','visible'=>false, 'idkey'=>true, 'format'=>'HIDDEN', 'placeholder'=>'' ),
                'kode_propinsi'     => array('label'=>'Propinsi','visible'=>false, 'option'=>$propinsilist, 'format'=>'DROPDOWN_MDL', 'placeholder'=>'' ),
                'kode_kabupaten'    => array('label'=>'Kabupaten','visible'=>false, 'option'=>$kabupatenlist, 'format'=>'DROPDOWN_MDL', 'placeholder'=>'' ),
                'kode_kecamatan'    => array('label'=>'Kecamatan','visible'=>false, 'option'=>$kecamatanlist, 'format'=>'DROPDOWN_MDL', 'placeholder'=>'' ),
                'kode_kelurahan'    => array('label'=>'Kelurahan','visible'=>false, 'option'=>$kelurahanlist, 'format'=>'DROPDOWN_MDL', 'placeholder'=>'' ),
                'group_pengguna_id' => array('label'=>'Group','visible'=>true, 'format'=>'DROPDOWN', 'option'=>$grouplist,'placeholder'=>'' ),
                'username'          => array('label'=>'Akun login','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'' ),
                'password'          => array('label'=>'Kata Sandi','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'' ),
                'is_aktif'                      => array('label'=>'Aktif','visible'=>true, 'format'=>'RADIO', 'option'=>array(0=>'TIDAK AKTIF', 1=>'AKTIF'),'placeholder'=>'' ),
                'tanggal_buat'                  => array('label'=>'Tanggal Buat','visible'=>true, 'format'=>'TEXT_DISABLED', 'placeholder'=>'' ),
                'tanggal_ubah'        => array('label'=>'Tanggal Ubah','visible'=>true, 'format'=>'TEXT_DISABLED', 'placeholder'=>'' ),
            ),
            'keyfield'=> 'kode_pengguna',
            'join'  => array(
                array('pengguna_group', 'pengguna_group.group_pengguna_id=pengguna.group_pengguna_id', 'left'),
            )
        );
    }
    
    function get_kodeurut($params)
    {
        //$this->db->where('kode_propinsi', $params['kode_propinsi']);
        //$this->db->where('kode_kabupaten', $params['kode_kabupaten']);
        //$this->db->where('kode_kecamatan', $params['kode_kecamatan']);
        $this->db->where('kode_kelurahan', $params['kode_kelurahan']);
        $number = $this->db->count_all_results('pengguna_profile');
        $number = $number+1;
        $number_digit = $invID = str_pad($number, 3, '0', STR_PAD_LEFT);;
        return $params['kode_kelurahan'].$number_digit;
    }
    
}