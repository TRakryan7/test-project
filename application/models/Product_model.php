<?php

class Product_model extends CI_Model
{
    private $_table = 'produk';

    public function find()
    {
    //   var_dump($result->row());
        $this->db->select('*');
        $this->db->join('kategori','kategori.id_kategori = produk.kategori_id');

        return $this->db->get_where('produk', ['status_id' => 1])->result_array();
    }

    public function find_by_id($id)
    {   
        return $this->db->get_where($this->_table,['id_produk'=>$id])->row();
    }

    public function update($where,$data)
    {
        $this->db->where($where);
		$this->db->update($this->_table,$data);
    }

    public function insert($data){
        if(!$data){
            return;
        }

        return $this->db->insert($this->_table,$data);

    }

    public function delete($id){
        return $this->db->delete($this->_table,['id_produk' => $id]);
    }

    public function rules()
	{
		return [
			[
				'field' => 'nama_produk', 
				'label' => 'nama_produk', 
				'rules' => 'required'
			],
			[
				'field' => 'harga', 
				'label' => 'harga', 
				'rules' => 'required|numeric'
			],
			[
				'field' => 'nama_kategori', 
				'label' => 'nama_kategori', 
				'rules' => 'required'
            ],
			[
				'field' => 'nama_status', 
				'label' => 'nama_status', 
				'rules' => 'required'
            ],
		];
	}


}