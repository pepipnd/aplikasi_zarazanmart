<?php 

class Kategori extends CI_Controller
{
     function __construct()
     {
        parent::__construct();
        $this->load->model('Kategori_model');
     } 

    function daftar_kategori()
    {
        $data ['kategori']= $this->Kategori_model->daftar_kategori();
        $this->load->view('template/header');
        $this->load->view('kategori/daftar_kategori', $data);
        $this->load->view('template/footer');
    }

    function add_kategori()
    {
        $this->load->view('template/header');
        $this->load->view('kategori/add_kategori');
        $this->load->view('template/footer');
    }

    function simpankategori()
    {
        $this->Kategori_model->simpankategori();
        redirect('Kategori/daftar_kategori');
    } 

    function hapuskategori($id)
    {
        $this->Kategori_model->hapuskategori($id);
        redirect('Kategori/daftar_kategori');
    }

    function edit_kategori($id)
    {
        $this->load->view('template/header');
        $data['kategori'] = $this->Kategori_model->editkategori($id);
        $this->load->view('kategori/edit_kategori', $data);
        $this->load->view('template/footer');
    }

    function saveedit_kategori()
    {
        $this->Kategori_model->saveedit_kategori();
        redirect('Kategori/daftar_kategori');
    }

    function view_kategori($id)
    {
        $this->load->view('template/header');
        $data['kategori'] = $this->Kategori_model->kategoriproduk($id);
        $this->load->view('kategori/kategori',$data);
        $this->load->view('template/footer');
    }
}