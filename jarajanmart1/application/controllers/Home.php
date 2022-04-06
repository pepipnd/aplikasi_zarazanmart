<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Categories_model');
		$this->load->model('Products_model');
		$this->load->model('Settings_model');
		$this->load->model('Customer_model');
		$this->load->model('User_model');
		$this->load->model('Admin_model');
	}

    function index()
    {
        $data['title'] =  $this->config->item('app_name');
        $data['css'] = 'style';
        $data['responsive'] = 'style-responsive';
        $data['setting'] = $this->Settings_model->getSetting();
        $data['categories'] = $this->Categories_model->getCategories();
        $data['categoriesLimit'] = $this->Categories_model->getCategoriesLimit();
        $data['recent'] = $this->Products_model->getProductsLimit();
        if($this->session->userdata('id')){
                @$data['keranjang'] = $this->Products_model->show_tmp();
        }
        $data['allProducts'] = $this->db->get('produk');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/banner');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }

    function cart()
    {
        $data['title'] =  $this->config->item('app_name');
        $data['css'] = 'style';
        $data['responsive'] = 'style-responsive';
        $data['setting'] = $this->Settings_model->getSetting();
        $data['categories'] = $this->Categories_model->getCategories();
        $data['categoriesLimit'] = $this->Categories_model->getCategoriesLimit();
        if($this->session->userdata('id')){
                @$data['keranjang'] = $this->Products_model->show_tmp();
                @$datauser   = $this->Customer_model->detailuser();
                @$data['user'] = $datauser[0];
        }
        $data['cart'] = $this->Customer_model->showkeranjang();
        $this->load->view('templates/headermidtrans', $data);
        $this->load->view('templates/navbar');
        $this->load->view('cart', $data);
        $this->load->view('templates/footerv2');
    }

    function user()
    {
        $data['title'] =  $this->config->item('app_name');
        $data['css'] = 'style';
        $data['responsive'] = 'style-responsive';
        $data['setting'] = $this->Settings_model->getSetting();
        $data['categories'] = $this->Categories_model->getCategories();
        $data['categoriesLimit'] = $this->Categories_model->getCategoriesLimit();
        if($this->session->userdata('id')){
                @$data['keranjang'] = $this->Products_model->show_tmp();
                $data['transaksi'] = $this->User_model->gettransaksi();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('user', $data);
        $this->load->view('templates/footerv2');
    }
    function profile()
    {
        $id = $this->session->userdata('id');
        $data['title'] =  $this->config->item('app_name');
        $data['css'] = 'style';
        $data['responsive'] = 'style-responsive';
        $data['setting'] = $this->Settings_model->getSetting();
        $data['categories'] = $this->Categories_model->getCategories();
        $data['categoriesLimit'] = $this->Categories_model->getCategoriesLimit();
        $member = $this->Customer_model->member($id);
        $data['member'] = $member[0];
        if($this->session->userdata('id')){
                @$data['keranjang'] = $this->Products_model->show_tmp();
                $data['transaksi'] = $this->User_model->gettransaksi();
                //$data['member'] = $this->User_model->getmember();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('profile', $data);
        $this->load->view('templates/footerv2');;
    }
    function edit_profile()
    {
        $id = $this->session->userdata('id');
        $data['title'] =  $this->config->item('app_name');
        $data['css'] = 'style';
        $data['responsive'] = 'style-responsive';
        $data['setting'] = $this->Settings_model->getSetting();
        $data['categories'] = $this->Categories_model->getCategories();
        $data['categoriesLimit'] = $this->Categories_model->getCategoriesLimit();
        $members = $this->Customer_model->edit_profile($id);
        $data['member'] = $members[0];
        if($this->session->userdata('id')){
                @$data['keranjang'] = $this->Products_model->show_tmp();
                $data['transaksi'] = $this->User_model->gettransaksi();
                //$data['member'] = $this->User_model->getmember();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('edit_profile', $data);
        $this->load->view('templates/footerv2');
    }
    function ganti_password()
    {
        $data['title'] =  $this->config->item('app_name');
        $data['css'] = 'style';
        $data['responsive'] = 'style-responsive';
        $data['setting'] = $this->Settings_model->getSetting();
        $data['categories'] = $this->Categories_model->getCategories();
        $data['categoriesLimit'] = $this->Categories_model->getCategoriesLimit();
        if($this->session->userdata('id')){
                @$data['keranjang'] = $this->Products_model->show_tmp();
                $data['transaksi'] = $this->User_model->gettransaksi();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('ganti_pass', $data);
        $this->load->view('templates/footerv2');
    }
    function gantipassword_aksi()
    {
        $id = $this->session->userdata('id');
        $passbaru = $this->input->post('passbaru');
        $konpass = $this->input->post('konpass');

        if($passbaru == $konpass){
            $gantipass = array(
                'password' => md5($passbaru)
            );
            $where = array(
                'id' => $id
            );
            $this->Customer_model->gantipass($gantipass,$where);
            redirect('Login/logout');
        }else{
            redirect('Home/ganti_password');
        } 
    }
    function detail_trs($id)
    {
        $data['title'] =  $this->config->item('app_name');
        $data['css'] = 'style';
        $data['responsive'] = 'style-responsive';
        $data['setting'] = $this->Settings_model->getSetting();
        $data['categories'] = $this->Categories_model->getCategories();
        $data['categoriesLimit'] = $this->Categories_model->getCategoriesLimit();
        $data['detailtrs'] = $this->Customer_model->detailtrs($id);
        //$invdetail = $this->Admin_model->showdetail($id);
        //$data['invoice'] = $invdetail[0];
        //$data['invoice_detail'] = $this->Admin_model->showdetailproduk($id);

        if($this->session->userdata('id')){
                @$data['keranjang'] = $this->Products_model->show_tmp();
                $data['transaksi'] = $this->Products_model->detailtrs($id);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('detail_trs', $data);
        $this->load->view('templates/footerv2');
    }
    function search()
    {
         $data['title'] =  $this->config->item('app_name');
        $data['css'] = 'style';
        $data['responsive'] = 'style-responsive';
        $data['setting'] = $this->Settings_model->getSetting();
        $data['categories'] = $this->Categories_model->getCategories();
        $data['categoriesLimit'] = $this->Categories_model->getCategoriesLimit();
        $data['recent'] = $this->Products_model->getProductsLimit();

        //$data['allProducts'] = $this->Products_model->show_produk();
        
        if($this->session->userdata('id')){
                @$data['keranjang'] = $this->Products_model->show_tmp();
                $search = $this->Products_model->search(); 
        }

        // @$search = $this->input->post('search'); 
        // if(@$search){
        //     $this->db->select('*');
        //     $this->db->from('produk');
        //     $this->db->like('NAMA', $search); 
        //     return $this->db->get()->result();
        // }else
        // {
        //     $this->db->limit('10');
        //     //$data['allProducts'] = $this->db->get('produk');
        //     return $this->db->get('produk')->result();
        // }
        $data['allProducts'] = $this->db->get('produk');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/banner');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }

}