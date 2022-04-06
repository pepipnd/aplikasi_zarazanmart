<?php 

class Customer extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Customer_model','cm');
        
        if($_SESSION['level'] == '' or $_SESSION['level'] != 'customer') 
        {
            redirect('/');
        }  
    }

    function index()
    {
        //menampilkan data produk 
        $data['produk'] = $this->cm->show_produk();

        //keranjang belanja
        $total =  $this->cm->showchart();
        $data['total'] = $total[0]->total;

        $this->load->view('template_user/header', $data);
        $this->load->view('customer/index', $data);
    }

    function transaksi()
    {
        $data['datatransaksi']  = $this->cm->showtransaksi();
        
        $total =  $this->cm->showchart();
        $data['total'] = $total[0]->total;

        $this->load->view('template_user/header', $data);
        $this->load->view('customer/datatransaksi', $data);
        $this->load->view('template_user/footer');
    }

    function add_chart($KODE_BARANG)
    {
        $this->cm->tambah_data($KODE_BARANG);
        redirect('Customer');
    }

    function lihat_keranjang(){

        $total =  $this->cm->showchart();
        $data['total'] = $total[0]->total;
        $data['keranjang'] = $this->cm->showkeranjang();
        
        $this->load->view('template_user/header', $data);
        $this->load->view('customer/keranjangbelanja', $data);
    }

    function delete_keranjang($id)
    {
        $this->cm->delete_keranjang($id);
        redirect('Customer/lihat_keranjang');
    }

    function search()
    {
        $data['produk'] = $this->cm->show_produk();
        
        //keranjang belanja
        $total =  $this->cm->showchart();
        $data['total'] = $total[0]->total;

        $this->load->view('template_user/header', $data);
        $this->load->view('customer/index', $data);
    }

    function checkout()
    {
        $idnya = $this->cm->checkout();

        redirect('Customer/show_detail/'.$idnya);
    }

    function show_detail($id)
    {
        //invoice
        $invdetail = $this->cm->showdetail($id);
        $data['invoice'] = $invdetail[0];

        //detail invoice
        $data['invoice_detail'] = $this->cm->showdetailproduk($id);

        //keranjang belanja
        $total =  $this->cm->showchart();
        $data['total'] = $total[0]->total;

        $this->load->view('template_user/header', $data);
        $this->load->view('customer/invoice', $data);
        $this->load->view('template_user/footer');
    }
    function ganti_password()
    {
        $total =  $this->cm->showchart();
        $data['total'] = $total[0]->total;

        
        $this->load->view('template_user/header',$data);
        $this->load->view('customer/ganti_password');
        $this->load->view('template_user/footer');
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
            $this->cm->gantipass($gantipass,$where);
            redirect('Login/logout');
        }else{
            redirect('Home/ganti_password');
        } 
    }
    function profile()
    {
        $id = $this->session->userdata('id');
        $total =  $this->cm->showchart();
        $data['total'] = $total[0]->total;

        $member = $this->cm->member($id);
        $data['member'] = $member[0];


        $this->load->view('template_user/header',$data);
        $this->load->view('customer/datamember',$data);
        $this->load->view('template_user/footer');
    }
    function edit_profile()
    {
        $id = $this->session->userdata('id');
        $total =  $this->cm->showchart();
        $data['total'] = $total[0]->total;
        $members = $this->cm->edit_profile($id);
        $data['member'] = $members[0];

        $this->load->view('template_user/header',$data);
        $this->load->view('customer/editprofile',$data);
        $this->load->view('template_user/footer');
    }
    function save_edit_profile()
    {
        //deklarasi variabel
        $id = $this->session->userdata('id');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $no_hp = $this->input->post('no_hp');
        $alamat_lengkap = $this->input->post('alamat_lengkap');
        $email = $this->input->post('email');
        
        //proses upload
        $config['upload_path']          = "./foto/";
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 5000;
 
        $this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')){
            //jika gagal upload
             $data = array(
                'nama_lengkap' => $nama_lengkap,
                'no_hp' => $no_hp,
                'alamat_lengkap' => $alamat_lengkap,
                'email' => $email,
            );
            $where = array( 'id'=> $id);
            $this->cm->updateprofil($data, $where);
            redirect('home/profile');

		}else{
            //proses upload ke folder
			$data = array('upload_data' => $this->upload->data());
            $namafile =  $this->upload->data("file_name");

            //update ke database
            $data = array(
                'nama_lengkap' => $nama_lengkap,
                'foto' => $namafile,
                'no_hp' => $no_hp,
                'alamat_lengkap' => $alamat_lengkap,
                'email' => $email,
            );

            $where = array( 'id'=> $id);

            $this->cm->updateprofil($data, $where);

            redirect('home/profile');

        }
    }
    function edit_keranjang($id)
    {
        $id = $this->session->userdata('id');
        $total =  $this->cm->showchart();
        $data['total'] = $total[0]->total;
        $data['keranjang'] = $this->cm->showkeranjang();

        $this->cm->edit_keranjang($id);
        
        $this->load->view('template_user/header', $data);
        $this->load->view('customer/editkeranjang',$data);
        $this->load->view('template_user/footer');
    }
    function save_edit_keranjang()
    {
        $this->cm->save_edit_keranjang();
        redirect('Customer/lihat_keranjang');
    }
    function ubahqty($id)
    {
        $this->cm->ubahqty_m($id);
        redirect('Customer/lihat_keranjang');
    }
}