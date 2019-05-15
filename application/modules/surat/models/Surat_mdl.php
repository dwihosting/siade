<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'    => 'surat',
            'coloum'    => array(
                'tanggal_terbit'	=> array('label'=>'Tanggal Terbit','visible'=>true, 'format'=>'DATEPICKER', 'placeholder'=>''),
                'nomor_surat'     	=> array('label'=>'Nomor Surat','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'' ),				
                'jenis_surat'      	=> array('label'=>'Jenis Surat','visible'=>true, 'format'=>'HIDDEN', 'option'=>array('MASUK'=>'MASUK', 'KELUAR'=>'KELUAR'), 'placeholder'=>''),			// surat keluar, surat masuk
		'surat_kategori_id'     => array('label'=>'Kategori','visible'=>true, 'format'=>'HIDDEN', 'placeholder'=>''),				// surat keluar, surat masuk
                'perihal'               => array('label'=>'Perihal','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'isi'    		=> array('label'=>'Isi','visible'=>false, 'format'=>'TEXTAREA', 'placeholder'=>''),
            ),
            'keyfield'  => 'nomor_surat',
            'order'     => array(
                array('perihal', 'asc'),
            ),
            'join'      => array(
                array('surat_kategori', 'surat_kategori.surat_kategori_id=surat.surat_kategori_id', 'left')
            )
        );
    }
    
    
    
}