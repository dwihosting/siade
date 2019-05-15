<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_kategori_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'    => 'surat_kategori',
            'coloum'    => array(
                'surat_kategori_id'	=> array('label'=>'Tanggal Terbit','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'surat_kategori_nama'   => array('label'=>'Nomor Surat','visible'=>false, 'format'=>'TEXT', 'placeholder'=>'' ),
            ),
            'keyfield'  => 'surat_kategori_id',
            'order'     => array(
                array('surat_kategori_nama', 'asc'),
            )
        );
    }
    
    
    
}