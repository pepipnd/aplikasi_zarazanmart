<?php 

class Product extends CI_Controller
{
    function __construct(){
      parent::__construct();
        $this->load->model('Admin_model','am');
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
        $config['upload_path']          = "'product/'";
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
            $row = array();
            //ditampilkan di view
            $row[] = $field->KODE_BARANG;
            $row[] = $field->KODE_BARCODE;
            $row[] = $field->GAMBAR;
            $row[] = $field->NAMA;
            $row[] = $field->HARGA_BELI;
            $row[] = $field->HARGA_JUAL;
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

}