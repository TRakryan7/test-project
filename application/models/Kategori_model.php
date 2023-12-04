<?php

class Kategori_model extends CI_Model
{
    private $_table = 'kategori';

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
        $query = $this->db->get_where($this->_table,['nama_kategori' => $name]);
        $getId = (int) $query->row()->id_kategori;
        return $getId;
      }

    public function insert($data){
        if(!$data){
            return;
        }

        $this->db->insert($this->_table,['nama_kategori' => $data]);

        $kategori = $this->find_by_name($data);

        return $kategori->id_kategori;
    }

}