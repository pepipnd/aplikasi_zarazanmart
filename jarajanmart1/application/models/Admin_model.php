<?php 

class Admin_model extends CI_Model {

    //settingan
    var $table = 'produk'; //nama tabel dari database
    var $column_order = array(null, 'KODE_BARANG','KODE_BARCODE','NAMA'); //field yang ada di table user
    var $column_search = array('KODE_BARANG','KODE_BARCODE','NAMA'); //field yang diizin untuk pencarian 
    var $order = array('NAMA' => 'asc'); // default order 
    //batas setingan

    function showproduk()
    {
        //$this->db->select('produk.*, kategori.id as idkategori, kategori.nama_kategori');
        //$this->db->join('kategori','kategori.id = produk.kategori_id');
        $this->db->select('KODE_BARANG,KODE_BARCODE,GAMBAR,NAMA,HARGA_BELI,HARGA_JUAL');
        $this->db->limit('1000');
        return $this->db->get('produk')->result();
    }
    function simpan_product()
    {
        $nama_produk = $this->input->post('nama_produk');
        $nama_kategori = $this->input->post('nama_kategori');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $data = array(
            'nama_produk' => $nama_produk,
            'kategori_id' => $nama_kategori,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'stok' => $stok,
        );
        $this->db->insert('produk', $data);
    }
    function kategori()
    {
        return $this->db->get('kategori')->result();
    }
    function produk($KODE_BARANG)
    {
        return $this->db->get_where('produk', array('KODE_BARANG' => $KODE_BARANG))->result();
    }
      function updateproduk($data,$where)
      {
        $this->db->update('produk',$data,$where);
      }
      function datatransaksi()
      {
          return $this->db->get('transaksi')->result();
      }
       function showdetail($id)
    {
        return $this->db->get_where('transaksi', array('id' => $id))->result();
    }
    function showdetailproduk($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi_detail');
        $this->db->join('produk','produk.KODE_BARANG = transaksi_detail.produk_id','left');
        $this->db->where('transaksi_id', $id);
        return $this->db->get()->result();
    }
    function kembaliproduk($id)
    {
        return $this->db->get_where('produk', array('KODE_BARANG' => $id))->result();
    }

//ieu nu kudu di copy
    private function _get_datatables_query()
    {
        $this->db->from($this->table);
 
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
    public function akun()
    {
        return $this->db->get('tbl_member')->result();
    }
    function hapusakun($id)
    {
        $this->db->delete('tbl_member', array('id' => $id));
    }
    function member()
    {
        return $this->db->get('tbl_member')->result();
    }
    function editakun($id)
     {
        return $this->db->get_where('tbl_member', array('id' => $id))->result();
     }
     function updateakun($data, $where)
    {
        $this->db->update('tbl_member', $data, $where);
    }
    function databanner()
    { 
        return $this->db->get('banner')->result();
    }

     function datasosialmedia()
    {
        return $this->db->get('sosmed')->result();
    }

     function datapages()
    {
        return $this->db->get('pages')->result();
    }
    function hapusbanner($id)
    {
        $this->db->delete('banner', array('id' => $id));
    }
    function editbanner($id)
     {
        return $this->db->get_where('banner', array('id' => $id))->result();
     }
    function updatebanner($data, $where)
    {
        $this->db->update('banner', $data, $where);
    }
    function hapussm($id)
    {
        $this->db->delete('sosmed', array('id' => $id));
    }
    function editsm($id)
     {
        return $this->db->get_where('sosmed', array('id' => $id))->result();
     }
     function updatesm($data, $where)
    {
        $this->db->update('sosmed', $data, $where);
    }
    function simpan_pages()
    {
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $slug = $this->input->post('slug');

        $data = array(
            'title' => $title,
            'content' => $content,
            'slug' => $slug
        );
        $this->db->insert('pages', $data);
    }
    function hapusp($id)
    {
        $this->db->delete('pages', array('id' => $id));
    }
    function editpages($id)
     {
        return $this->db->get_where('pages', array('id' => $id))->result();
     }
      function save_edit_pages()
     {
         $title = $this->input->post('title');
         $content = $this->input->post('content');
         $slug = $this->input->post('slug');
         $id = $this->input->post('id');

         $data= array(
             'title' => $title,
             'content' => $content,
             'slug' => $slug
         );
         $this->db->where('id', $id);
         $this->db->update('pages', $data);
     }
}