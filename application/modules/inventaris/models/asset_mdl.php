<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $kategorilist   = $this->all_kategori_asset->get_option();
        $this->table = array(
            'name'    => 'asset',
            'coloum'    => array(
                'kategori_id'   => array('label'=>'Kategori','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$kategorilist, 'placeholder'=>'', 'option'=>array() ),				
                'kode_asset'    => array('label'=>'Kode Asset','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'' ),
		'nama_asset'    => array('label'=>'Nama Asset','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
            ),
            'keyfield'  => 'kode_asset',
            'join'      => array(
                array('asset_kategori', 'asset_kategori.kode_kategori=asset.kode_kategori', 'left'),
            )
        );
    }
    
    
    
}