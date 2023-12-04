<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    function __contruct()
    {
        parent::__construct();
        $this->load->model(array('product_model','kategori_model','status_model'));
    }


	public function index()
	{
		$data['meta'] = [
			'title' => 'Home',
		];

        $this->load->model(array('product_model','kategori_model','status_model'));

        $data['items'] = $this->product_model->find();

		$this->load->view('home', $data);
	}

	public function about()
	{
		$data['meta'] = [
			'title' => 'About BeritaCoding',
		];

		$this->load->view('wellcome_message', $data);
	}

	public function create()
	{
		$data['meta'] = [
			'title' => 'Add New',
		];

        $this->load->library('form_validation');

        $this->load->model(array('product_model','kategori_model','status_model'));

        $data['kategori'] = $this->kategori_model->find();
        $data['status'] = $this->status_model->find();
		
        if($this->input->method() === 'post'){

            $rules = $this->product_model->rules();
            $this->form_validation->set_rules($rules);
            
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('create', $data);
              }

            // $kategori = $this->kategori_model->find_by_name($this->input->post('nama_kategori'));

            // if(!$kategori){
            //     $kategori = $this->kategori_model->insert($this->input->post('nama_kategori'));
            // }

            // $status = $this->status_model->find_by_name($this->input->post('nama_status'));

            // if(!$status){
            //     $rstatus = $this->status_model->insert($this->input->post('nama_status'));
            // }
                // var_dump($this->input->post);

            $feedback = [
                'nama_produk'=> $this->input->post('nama_produk'),
                'harga'=> $this->input->post('harga'),
                'kategori_id'=> $this->input->post('nama_kategori'),
                'status_id'=> $this->input->post('nama_status'),
            ];

            $feedback_saved = $this->product_model->insert($feedback);

            // redirect(base_url('/'));
            // if ($feedback_saved) {
            //     return $this->load->view('contact_thanks');
            //   }
        }

		$this->load->view('create', $data);
	}

    public function edit($id){
        $this->load->model(array('product_model','kategori_model','status_model'));

        $data['item'] = $this->product_model->find_by_id((int)$id);
        $data['kategori'] = $this->kategori_model->find();
        $data['status'] = $this->status_model->find();

        $this->load->view('edit', $data);
    }

    public function update($id)
    {
        $this->load->model(array('product_model','kategori_model','status_model'));

        $this->load->library('form_validation');

        
        $rules = $this->product_model->rules();
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('create', $data);
          }


        $nama_produk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $kategori_id = $this->input->post('nama_kategori');
        $status_id = $this->input->post('nama_status');

        $data = [
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'kategori_id' => $kategori_id,
            'status_id' => $status_id
        ];

        $where =[
            'id_produk' => (int)$id
        ];

        $this->product_model->update($where,$data);
        redirect(base_url('/'));
    }

    public function delete($id)
    {
        $this->load->model(array('product_model','kategori_model','status_model'));
        
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            echo 'Deleted successfully.';
        }
    }
}