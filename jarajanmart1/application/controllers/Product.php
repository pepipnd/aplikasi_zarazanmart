<?php 

class Product extends CI_Controller
{
    function __construct(){
      parent::__construct();
        $this->load->model('Admin_model','am');
		$this->load->library('form_validation');
		$this->load->model('Categories_model');
		$this->load->model('Products_model');
		$this->load->model('Settings_model');
		$this->load->model('Promo_model');
    }
    function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/footer');
    }
    function daftar_product()
    {
        $this->load->view('template/header');
        $this->load->view('admin/produk');
    }
    function tambah_product()
    {
        //$data['kategori'] = $this->am->kategori();

        $this->load->view('template/header');
        $this->load->view('admin/tambah_product');
        $this->load->view('template/footer');
    }
    function simpan_product()
    {
         //deklarasi variabel
        $KODE_BARCODE = $this->input->post('KODE_BARCODE');
        $NAMA = $this->input->post('NAMA');
        $HARGA_BELI = $this->input->post('HARGA_BELI');
        $HARGA_JUAL = $this->input->post('HARGA_JUAL');
        
        //proses upload
        $config['upload_path']          = "./product/";
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 5000;
 
        $this->load->library('upload', $config);

		if (!$this->upload->do_upload('GAMBAR')){
            //jika gagal upload
             $data = array(
            'KODE_BARCODE' => $KODE_BARCODE,
            'NAMA' => $NAMA,
            'HARGA_BELI' => $HARGA_BELI,
            'HARGA_JUAL' => $HARGA_JUAL
            );
            $this->db->insert('produk', $data);
            redirect('Product/daftar_product');

		}else{
            //proses upload ke folder
			$data = array('upload_data' => $this->upload->data());
            $namafile =  $this->upload->data("file_name");

            //update ke database
            $data = array(
            'KODE_BARCODE' => $KODE_BARCODE,
            'NAMA' => $NAMA,
            'HARGA_BELI' => $HARGA_BELI,
            'HARGA_JUAL' => $HARGA_JUAL,
            'GAMBAR' => $namafile
            );
            $this->db->insert('produk', $data);
            redirect('Product/daftar_product');
        }
    }
    function ubah_produk($KODE_BARANG)
    {
        $data['produk'] = $this->am->produk($KODE_BARANG);

        $this->load->view('template/header');
        $this->load->view('admin/edit_produk',$data);
        $this->load->view('template/footer');
    }
     function proses_ubah()
    {

    //deklarasi variabel
       $KODE_BARANG = $this->input->post('KODE_BARANG');
       $KODE_BARCODE = $this->input->post('KODE_BARCODE');
       $NAMA = $this->input->post('NAMA');
       $HARGA_BELI = $this->input->post('HARGA_BELI');
       $HARGA_JUAL = $this->input->post('HARGA_JUAL');
       $GAMBAR= $this->input->post('GAMBAR');
    //  $stok= $this->input->post('stok');

        //proses upload
        $config['upload_path']          = "product/";
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('GAMBAR')){
          //jika gagal upload
            $data= array(
                'KODE_BARCODE' => $KODE_BARCODE,
                'NAMA' => $NAMA,
                'HARGA_BELI' => $HARGA_BELI,
                'HARGA_JUAL' => $HARGA_JUAL,
            //    'stok' => $stok,
            );
            $where = array('KODE_BARANG'=>$KODE_BARANG);
            $this->am->updateproduk($data,$where);
            redirect('Product/daftar_product');
        }else{
            //proses update ke folder
            $data = array('upload_data' => $this->upload->data());
            $namafile =  $this->upload->data("file_name");

            //update data ke database
            $data= array(
                'KODE_BARCODE' => $KODE_BARCODE,
                'NAMA' => $NAMA,
                'HARGA_BELI' => $HARGA_BELI,
                'HARGA_JUAL' => $HARGA_JUAL,
                'GAMBAR' => $namafile
                // 'stok' => $stok
            );
            $where = array('KODE_BARANG'=>$KODE_BARANG);
            $this->am->updateproduk($data,$where);
            redirect('Product/daftar_product');

        }

    }
    function kembali($id)
    {
        $this->load->view('template/header');
        $data['produk'] = $this->am->kembaliproduk($id);
        $this->load->view('admin/produk',$data);
        $this->load->view('template/footer');   

        redirect('Product/daftar_product');
     }

     function get_data_produk()
     {
         //KE MODEL
        $list = $this->am->get_datatables();
        //
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $id  = $field->KODE_BARANG;
            $row = array();
            $tmp = base_url('product/').$field->GAMBAR;
            //ditampilkan di view
            $row[] = $field->KODE_BARANG;
            $row[] = "<img src='$tmp' class='img-responsive' width='100px' height='100px'>";
            $row[] = $field->NAMA;
            $row[] = $field->HARGA_BELI;
            $row[] = $field->HARGA_JUAL;
            $row[] = "
                        <a href=" . base_url('Product/ubah_produk/') . $id . " title='Update Data'>
                            <button id='$id' name='btnupdate' class='btn btn-30 btn-primary btn-icon-trash btn-square btnupdate' style='height:30px; width:30px ; vertical-align:middle'><i class='fa fa-edit'></i></button>
                        </a>
                        <button id='$id' title='Delete Data' name='btndelete' class='btn btn-30 btn-danger btn-icon-trash btn-square btndelete' style='height:30px; width:30px ; vertical-align:middle'><i class='fa fa-trash'></i></button>                          
                    ";
            //ditampilkandi view
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->am->count_all(),
            "recordsFiltered" => $this->am->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
     }


     function delete_data()
     {

        $produk_id = $this->input->post('id');
        $produk_id = str_replace("'","",$produk_id);
       
        $where = array(
            'KODE_BARANG' => $produk_id
        );

        $del = $this->db->delete('produk',$where);
     }


     function detail($kodebarang)
     {

        $data['title'] =  $this->config->item('app_name');
        $data['css'] = 'style';
        $data['responsive'] = 'style-responsive';
        $data['setting'] = $this->Settings_model->getSetting();
        $data['categories'] = $this->Categories_model->getCategories();
        $data['categoriesLimit'] = $this->Categories_model->getCategoriesLimit();
        $data['product'] = $this->Products_model->getProductById($kodebarang);
        if($this->session->userdata('id')){

            if($this->show_tmp()){
                $data['keranjang'] = $this->show_tmp();
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar',$data);
        $this->load->view('detail', $data);
        $this->load->view('templates/footerv2');
    }

    function add_to_cart()
    {
        $user   = $this->session->userdata('id');
        $id     = $this->input->post('id');
        $qty    = $this->input->post('qty');


        //cari data di tmp 
        $query   = $this->db->get_where('tmp_trs', array('barang_id' => $id, 'user_id' => $user))->result();
        @$qtyasal = $query[0]->qty;
        if($query)
        {
            $data_update = array(
                'qty'       => $qtyasal+$qty
            );

            $where = array(
                'user_id' => $user,
                'barang_id' => $id
            );
            $this->Products_model->update($data_update, $where);

        }else
        {
             $data = array(
                'user_id'   => $user,
                'barang_id' => $id,
                'qty'       => $qty
            );
            $this->Products_model->insert($data);
        }
        
        @$total = $this->Products_model->getkeranjang();

        echo json_encode(array("status" => 200,"total" => $total, "message" => "No Record","type"=>"fail","url"=>""));  
    }

    function show_tmp()
    {
        $user   = $this->session->userdata('id');
        @$total  = $this->Products_model->show_tmp();
        return @$total;
    }

    function delete_keranjang($id)
    {
        $data = array(
            'id'   => $id
        );
        $this->Products_model->delete_keranjang($data);

        redirect('Home/cart');
    }
}