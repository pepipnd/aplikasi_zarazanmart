<?php 

class Admin extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Admin_model','am');

        if($_SESSION['level'] == '' or $_SESSION['level'] != 'admin') 
        {
            redirect('/');
        }  
    }

    function index()
    {
        $this->load->view('template/header');
        $this->load->view('admin/index');
        $this->load->view('template/footer'); 
    }

    
    function produk()
    {
        $data['produk'] = $this->am->showproduk();
        $this->load->view('template/header');
        $this->load->view('admin/produk', $data);
        $this->load->view('template/footer');
    }


    function transaksi()
    {
        $data['datatransaksi'] = $this->am->datatransaksi();
        $this->load->view('template/header');
        $this->load->view('admin/transaksi', $data);
        $this->load->view('template/footer');
    }

    // function add_produk()
    // {
    //     $this->load->view('template/header');
    //     $this->load->view('admin/add_produk');
    //     $this->load->view('template/footer');
    // }
    function show_detail($id)
    {
         //invoice
        $invdetail = $this->am->showdetail($id);
        $data['invoice'] = $invdetail[0];

        //detail invoice
        $data['invoice_detail'] = $this->am->showdetailproduk($id);

        $this->load->view('template/header');
        $this->load->view('customer/invoice', $data);
        $this->load->view('template_user/footer');
    }
    function akun()
    {
        $data['akun'] = $this->am->akun();
        $this->load->view('template/header');
        $this->load->view('admin/akun', $data);
        $this->load->view('template/footer');
    }
    function hapusakun($id)
    {
        $this->am->hapusakun($id);
        redirect('Admin/akun');
    }
    function add_akun()
    {
        $this->load->view('template/header');
        $this->load->view('Admin/add_akun');
        $this->load->view('template/footer');
    }
    function simpan_akun()
    {
        //deklarasi variabel
        $nama_lengkap = $this->input->post('nama_lengkap');
        $no_hp = $this->input->post('no_hp');
        $alamat_lengkap = $this->input->post('alamat_lengkap');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        
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
            'password' =>  md5($password),
            'level' => $level
            );
            $this->db->insert('tbl_member', $data);
            redirect('Admin/akun');

		}else{
            //proses upload ke folder
			$data = array('upload_data' => $this->upload->data());
            $namafile =  $this->upload->data("file_name");

            //update ke database
            $data = array(
            'nama_lengkap' => $nama_lengkap,
            'no_hp' => $no_hp,
            'alamat_lengkap' => $alamat_lengkap,
            'email' => $email,
            'password' => md5($password),
            'level' => $level,
            'foto' => $namafile
            );
            $this->db->insert('tbl_member', $data);
            redirect('Admin/akun');
        }
    }
    function editakun($id)
    {
        $data['editakun'] = $this->am->editakun($id);

        $this->load->view('template/header');
        $this->load->view('Admin/editakun', $data);
        $this->load->view('template/footer');
    }
    function save_edit_akun()
    {
        //deklarasi variabel
        $id = $this->input->post('id');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $no_hp = $this->input->post('no_hp');
        $alamat_lengkap = $this->input->post('alamat_lengkap');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
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
            'password' => md5($password)
            );
            $where = array( 'id'=> $id);
            $this->am->updateakun($data, $where);
            redirect('Admin/akun');

		}else{
            //proses upload ke folder
			$data = array('upload_data' => $this->upload->data());
            $namafile =  $this->upload->data("file_name");

            //update ke database
            $data = array(
                'foto' => $namafile,
                'nama_lengkap' => $nama_lengkap,
                'no_hp' => $no_hp,
                'alamat_lengkap' => $alamat_lengkap,
                'email' => $email,
                'password' => md5($password)
            );

            $where = array( 'id'=> $id);

            $this->am->updateakun($data, $where);

            redirect('Admin/akun');

        }
    }
    function banner()
    {
        $data['banner'] = $this->am->databanner();
        $this->load->view('template/header');
        $this->load->view('admin/banner',$data);
        $this->load->view('template/footer');
    }

    function sosialmedia()
    {
        $data['sosialmedia'] = $this->am->datasosialmedia();
        $this->load->view('template/header');
        $this->load->view('admin/sosialmedia',$data);
        $this->load->view('template/footer');
    }

     function pages()
    {
        $data['pages'] = $this->am->datapages();
        $this->load->view('template/header');
        $this->load->view('admin/pages',$data);
        $this->load->view('template/footer');
    }
    function add_banner()
    {
        $this->load->view('template/header');
        $this->load->view('Admin/add_banner');
        $this->load->view('template/footer');
    }
    function simpan_banner()
    {
        //deklarasi variabel
        $url = $this->input->post('url');
        
        //proses upload
        $config['upload_path']          = "./banner/";
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 5000;
 
        $this->load->library('upload', $config);

		if (!$this->upload->do_upload('img')){
            //jika gagal upload
             $data = array(
            'url' => $url
            );
            $this->db->insert('banner', $data);
            redirect('Admin/banner');

		}else{
            //proses upload ke folder
			$data = array('upload_data' => $this->upload->data());
            $namafile =  $this->upload->data("file_name");

            //update ke database
            $data = array(
            'img' => $namafile,
            'url' => $url
            );
            $this->db->insert('banner', $data);
            redirect('Admin/banner');
        }
    }
    function hapusbanner($id)
    {
        $this->am->hapusbanner($id);
        redirect('Admin/banner');
    }
    function editbanner($id)
    {
        $data['editbanner'] = $this->am->editbanner($id);

        $this->load->view('template/header');
        $this->load->view('Admin/editbanner', $data);
        $this->load->view('template/footer');
    }
    function save_edit_banner()
    {
        //deklarasi variabel
        $id = $this->input->post('id');
        $url = $this->input->post('url');
        
        //proses upload
        $config['upload_path']          = "./banner/";
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 5000;
 
        $this->load->library('upload', $config);

		if (!$this->upload->do_upload('img')){
            //jika gagal upload
             $data = array(
            'url' => $url
            );
            $where = array( 'id'=> $id);
            $this->am->updatebanner($data, $where);
            redirect('Admin/banner');

		}else{
            //proses upload ke folder
			$data = array('upload_data' => $this->upload->data());
            $namafile =  $this->upload->data("file_name");

            //update ke database
            $data = array(
                'img' => $namafile,
                'url' => $url
            );

            $where = array( 'id'=> $id);
            $this->am->updatebanner($data, $where);
            redirect('Admin/banner');

        }
    }
    function add_sm()
    {
        $this->load->view('template/header');
        $this->load->view('Admin/add_sm');
        $this->load->view('template/footer');
    }
    function simpan_sm()
    {
        //deklarasi variabel
        $name = $this->input->post('name');
        $link = $this->input->post('link');
        
        //proses upload
        $config['upload_path']          = "./sosmed/";
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 5000;
 
        $this->load->library('upload', $config);

		if (!$this->upload->do_upload('icon')){
            //jika gagal upload
             $data = array(
            'link' => $link,
            'name' => $name
            );
            $this->db->insert('sosmed', $data);
            redirect('Admin/sosialmedia');

		}else{
            //proses upload ke folder
			$data = array('upload_data' => $this->upload->data());
            $namafile =  $this->upload->data("file_name");

            //update ke database
            $data = array(
            'name' => $name,
            'icon' => $namafile,
            'link' => $link
            );
            $this->db->insert('sosmed', $data);
            redirect('Admin/sosialmedia');
        }
    }
    function hapussm($id)
    {
        $this->am->hapussm($id);
        redirect('Admin/sosialmedia');
    }
    function editsm($id)
    {
        $data['editsm'] = $this->am->editsm($id);

        $this->load->view('template/header');
        $this->load->view('Admin/editsm', $data);
        $this->load->view('template/footer');
    }
    function save_edit_sm()
    {
        //deklarasi variabel
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $link = $this->input->post('link');
        
        //proses upload
        $config['upload_path']          = "./sosmed/";
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 5000;
 
        $this->load->library('upload', $config);

		if (!$this->upload->do_upload('icon')){
            //jika gagal upload
             $data = array(
            'name' => $name,
            'link' => $link
            );
            $where = array( 'id'=> $id);
            $this->am->updatesm($data, $where);
            redirect('Admin/sosialmedia');

		}else{
            //proses upload ke folder
			$data = array('upload_data' => $this->upload->data());
            $namafile =  $this->upload->data("file_name");

            //update ke database
            $data = array(
                'name' => $name,
                'link' => $link,
                'icon' => $namafile
            );

            $where = array( 'id'=> $id);
            $this->am->updatesm($data, $where);
            redirect('Admin/sosialmedia');

        }
    }
    function add_pages()
    {
        $this->load->view('template/header');
        $this->load->view('Admin/add_pages');
        $this->load->view('template/footer');
    }
     function simpan_pages()
    {
        $this->am->simpan_pages();
        redirect('Admin/pages');
    } 
    function hapusp($id)
    {
        $this->am->hapusp($id);
        redirect('Admin/pages');
    }
     function editp($id)
    {
        $data['editpages'] = $this->am->editpages($id);
        $this->load->view('template/header');
        $this->load->view('Admin/editpages', $data);
        $this->load->view('template/footer');
    }
    function save_edit_pages()
    {
        $this->am->save_edit_pages();
        redirect('Admin/pages');
    }
}