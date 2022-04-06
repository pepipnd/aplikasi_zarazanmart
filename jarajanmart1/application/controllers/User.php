<?php 

class User extends CI_Controller
{
    function __construct(){
        parent::__construct();
        
        if($_SESSION['level'] == '') 
        {
            redirect('/');
        }  

        
		$this->load->library('form_validation');
		$this->load->model('Categories_model');
		$this->load->model('Products_model');
		$this->load->model('Settings_model');
		$this->load->model('Customer_model');
    }

    function profil()
    {
        $data['title'] =  $this->config->item('app_name');
        $data['css'] = 'style';
        $data['responsive'] = 'style-responsive';
        $data['setting'] = $this->Settings_model->getSetting();
        $data['categories'] = $this->Categories_model->getCategories();
        $data['categoriesLimit'] = $this->Categories_model->getCategoriesLimit();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('user/profil', $data);
        $this->load->view('templates/footerv3');
    }

}