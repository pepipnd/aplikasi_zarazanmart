<?php 

class Stok_model extends CI_Model {
    
    //settingan 
    var $select = 'tbl_stok.*,produk.NAMA,produk.SATUAN'; // nama tabel dari database
    var $table = 'tbl_stok'; // nama tabel dari database
    var $tablejoin = 'produk'; // nama tabel dari database
    var $join = 'tbl_stok.KODE_BARANG = produk.KODE_BARANG'; // nama tabel dari database
    var $column_order = array(null,'KODE_STOK', 'KODE_BARANG'); 
    var $column_search = array( 'KODE_BARANG'); //field yang diizin untuk pencarian 
    var $order = array(  'KODE_BARANG'=> 'asc'); // default order 
    //batas setingan

    function daftarstok()
    {
        $this->db->select('tbl_stok.*, produk.KODE_BARANG as kodebarang, produk.NAMA, produk.KODE_BARCODE, produk.HARGA_BELI, produk.HARGA_JUAL');
        $this->db->join('produk','produk.KODE_BARANG = tbl_stok.KODE_BARANG');
        $this->db->limit('100');
        return $this->db->get('tbl_stok')->result();
    }

    function m_produk()
    {
        $this->db->limit('100');
       return $this->db->get('produk')->result();
    }

     function save_stok()
     {
        $nama_produk = $this->input->post('nama_produk');
        $stok_awal = $this->input->post('stok_awal');
        $stok_tambah = $this->input->post('stok_tambah');
        $stok_terjual = $this->input->post('stok_terjual');

        $data = array(
            'id_produk' => $nama_produk,
            'stok_awal' => $stok_awal,
            'stok_tambah' => $stok_tambah,
            'stok_terjual' => $stok_terjual
    );
    
    $this->db->insert('tbl_stok', $data);
    }
    
    function proses_tambah_data()
     {
         $stoktambah = $this->input->post('stoktambah');
         $idproduk = $this->input->post('idproduk');

         $a = $this->db->get_where('tbl_stok', array('KODE_BARANG' => $idproduk))->result();
         $b = $a[0];

         $sttambah      = $b->STOK_TAMBAH;

         $data= array(
             'STOK_TAMBAH' => $stoktambah+$sttambah
         );

         $where = array(
             'KODE_BARANG' => $idproduk
         );

         $this->db->update('tbl_stok', $data, $where);
     }
     
    function proses_kurang_data()
     {
         $stokkurang = $this->input->post('stokkurang');
         $idproduk = $this->input->post('kodeproduk');

         $a = $this->db->get_where('tbl_stok', array('KODE_BARANG' => $idproduk))->result();
         $b = $a[0];

         $stkurang      = $b->STOK_TERJUAL;

         $data= array(
             'STOK_TERJUAL' => $stokkurang+$stkurang
         );

         $where = array(
             'KODE_BARANG' => $idproduk
         );

         $this->db->update('tbl_stok', $data, $where);
     }


   private function _get_datatables_query()
    {
        $this->db->select($this->select);
        $this->db->from($this->table);
        $this->db->join($this->tablejoin, $this->join);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


}