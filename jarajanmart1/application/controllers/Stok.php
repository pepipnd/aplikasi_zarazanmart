<?php 
    class Stok extends CI_Controller
{
    
      function __construct()
     {
      parent::__construct();
      $this->load->model('Stok_model', 'sm');
     } 

     function view_stok()
    {
        // $data['stok']= $this->sm->daftarstok();
        $this->load->view('template/header');
        $this->load->view('admin/view_stok');
    }

    function tambah_stok()
    {
        $data['produk']= $this->sm->m_produk();
        $this->load->view('template/header');
        $this->load->view('admin/tambah_stok',$data);
        $this->load->view('template/footer');
    }


    function simpan_stok()
    {
        $this->sm->save_stok();
        redirect('Stok/view_stok');
    }


     function proses_tambah_data()
     {
         $this->sm->proses_tambah_data();
         redirect('Stok/view_stok');
     }

     function proses_kurang_data()
     {
         $this->sm->proses_kurang_data();
         redirect('Stok/view_stok');
     }

      function get_data_stok()
     {
         //KE MODEL
        $list = $this->sm->get_datatables();
        //
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row  = array();
            $sa   = $field->STOK_AWAL;
            $st   = $field->STOK_TAMBAH;
            $stj  = $field->STOK_TERJUAL;
            $skf = $field->STOK_AWAL + $field->STOK_TAMBAH -  $field->STOK_TERJUAL;
            $kodebarang = $field->KODE_BARANG;
            //ditampilkan di view
            $row[] = $field->KODE_STOK;
            $row[] = $field->NAMA;
            $row[] = $field->STOK_AWAL." ".$field->SATUAN;
            $row[] = $field->STOK_TAMBAH." ".$field->SATUAN;
            $row[] = $field->STOK_TERJUAL." ".$field->SATUAN;
            $row[] = $skf." ".$field->SATUAN;
            //ditampilkandi view
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sm->count_all(),
            "recordsFiltered" => $this->sm->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
     }
  
 }
