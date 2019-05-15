<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'    => 'asset_kategori',
            'coloum'    => array(
                'kode_kategori'     => array('label'=>'Kode','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'' ),
		'parent_id'         => array('label'=>'Parent','visible'=>true, 'format'=>'DROPDOWN_MDL', 'placeholder'=>'', 'option'=>array() ),				
                'nama_kategori'     => array('label'=>'Nama Kategori','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
            ),
        );
    }
    
    
    
}