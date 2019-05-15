<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_mdl extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function get_fields_list()
    {
        $keys = array_keys($this->table['coloum']);
        foreach($keys as $row):
            if ($this->table['coloum'][$row]['visible']){
                $data[] = array(
                    'label' => $this->table['coloum'][$row]['label']
                );
            };
        endforeach;
        return $data;
    }
    
    function get_form_fields_list($values)
    {
        $keys = array_keys($this->table['coloum']);
        
        foreach($keys as $row):
                $format = $this->table['coloum'][$row]['format'];
                $placeholder = $this->table['coloum'][$row]['placeholder'];
                $optionlist = '';
                
                if ($format == 'HIDDEN') {
                    $is_hidden = 'hide';
                } else {
                    $is_hidden = '';
                }
                
                if (!empty($this->table['coloum'][$row]['option'])){
                    $optionlist = $this->table['coloum'][$row]['option'];
                }
                
                if ($this->table['coloum'][$row]['format'] == 'DROPDOWN'){
                    $optionlist = $this->table['coloum'][$row]['option'];
                }
                
                if ($this->table['coloum'][$row]['format'] == 'RADIO'){                    
                    $optionlist = $this->table['coloum'][$row]['option'];
                }
                
                
                $data[] = array(
                    'label' => $this->table['coloum'][$row]['label'],
                    'format'=> create_display($row, $format, @$values[$row], $optionlist, $placeholder),
                    'IS_HIDDEN' => $is_hidden
                );            
        endforeach;
        return $data;
    }
    
    function get_detail($id)
    {
        $this->db->where($this->table['keyfield'], $id);
        $query = $this->db->get($this->table['name']);
        $row = $query->row();
        $data = (Array) $row;
        return $data;
    }
    
    function get_list($params)
    {
        $sEcho             = $params['sEcho'];
        $iDisplayLength    = $params['iDisplayLength'];
        $iDisplayStart     = $params['iDisplayStart'];
        $this->db->cache_on();
        $join = @$this->table['join'];
        if (!empty($join)){
            foreach($join as $row):
                $this->db->join($row[0],$row[1],$row[2]);
            endforeach;
        }
        $data['total']     = $this->db->count_all_results($this->table['name']);
        
        
        if (!empty($join)){
            foreach($join as $row):
                $this->db->join($row[0],$row[1],$row[2]);
            endforeach;
        }
        $this->db->limit($iDisplayLength,$iDisplayStart);
        $query = $this->db->get($this->table['name']);
        $data['result'] = $query->result();
        $this->db->cache_off();
        return $data;
    }
    
    function tambah($params)
    {
        $this->db->set($params);
        if ($this->db->insert($this->table['name'])){
            return true;
        } else {
            return false;
        };
    }
    
    function ubah($params, $id)
    {
        $this->db->set($params);
        $this->db->where($this->table['keyfield'], $id);
        if ($this->db->update($this->table['name'])) {
            return true;
        } else {
            return false;
        };
    }
    
    function hapus($id)
    {
        $this->db->where($this->table['keyfield'], $id);
        if ($this->db->delete($this->table['name'])) {
            return true;
        } else {
            return false;
        };
    }
}