<?php

class Status_model extends CI_Model
{
    private $_table = 'status';

    public function find()
    {
      return $this->db->get($this->_table)->result_array();
    }
    
    public function get_expired_product()
    {
      
    }

    public function find_by_name($name){
        if(!$name){
          return;
        }
        $query = $this->db->get_where($this->_table,['nama_status' => $name]);
        $getId = (int) $query->row()->id_status;
        return $getId;
      }


    public function insert($data){
        if(!$data){
            return;
        }

        $status = $this->db->insert($this->_table,['nama_status' => $data]);
        return $status->id_status;
    }

}