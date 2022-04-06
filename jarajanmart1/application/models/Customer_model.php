<?php 

class Customer_model extends CI_Model{

    function show_produk()
    {
        @$search = $this->input->post('search'); 

        if(@$search){
            $this->db->select('produk.NAMA,produk.HARGA_JUAL,produk.STOK,produk.GAMBAR,produk.KODE_BARANG,
            tbl_stok.STOK_AWAL,tbl_stok.STOK_TAMBAH,tbl_stok.STOK_TERJUAL
            ');
            $this->db->from('produk');
            $this->db->join('tbl_stok', 'tbl_stok.KODE_BARANG = produk.KODE_BARANG');
            $this->db->like('NAMA', $search); 
            $this->db->limit('12');
            return $this->db->get()->result();
            
        }else
        {
            $this->db->select('produk.NAMA,produk.HARGA_JUAL,produk.STOK,produk.GAMBAR,produk.KODE_BARANG,
            tbl_stok.STOK_AWAL,tbl_stok.STOK_TAMBAH,tbl_stok.STOK_TERJUAL
            ');
            $this->db->from('produk');
            $this->db->join('tbl_stok', 'tbl_stok.KODE_BARANG = produk.KODE_BARANG');
            $this->db->limit('12');
            return $this->db->get()->result();
        }
    }
    function showtransaksi()
    {
        $userlogin = $_SESSION['id'];
        
        return  $this->db->get_where('transaksi', array('customer_id' => $userlogin))->result();
    }

    function tambah_data($KODE_BARANG)
    {
        $produk = $KODE_BARANG;
        $user = $_SESSION['id'];

        //mengurangi stok
        $barang =  $this->db->get_where('produk', array('KODE_BARANG' => $KODE_BARANG))->result();
        $stok       = $barang[0]->STOK;
        $stokbarang = $stok-1;

        //proses update stok barang
        if($stok){
            
            //cek data
            $cari =  $this->db->get_where('tmp_trs', array('barang_id' => $produk, 'user_id' => $user))->result();
            $tmpid = $cari[0]->KODE_BARANG;
            $qty_asal = $cari[0]->qty+1;
            
            //deklarasi 
            if($cari){
                $data = array(
                    'qty' => $qty_asal
                );

                $where = array(
                    'id' => $tmpid
                );
                $this->db->update('tmp_trs', $data, $where);

            }else
            {
                $data = array(
                    'user_id' => $user,
                    'barang_id' => $produk,
                    'qty' => 1
                );
                $this->db->insert('tmp_trs', $data);
            }


            //update stok data barang
            $data = array(
                'STOK' => $stokbarang
            );
    
            $where = array(
                'KODE_BARANG' => $produk,
            );
            $this->db->update('produk', $data, $where);
        }
        

    }

    function showchart()
    {
        $user = $_SESSION['id'];
        
        $this->db->select('sum(qty) as total');
        $this->db->from('tmp_trs');
        $this->db->where('user_id', $user);
        return $this->db->get()->result();
    }

    function showkeranjang()
    {
        $user = $this->session->userdata('id');
        
        $this->db->select('produk.NAMA,produk.GAMBAR,produk.KODE_BARANG,produk.HARGA_JUAL,tmp_trs.*');
        $this->db->from('tmp_trs');
        $this->db->join('produk', 'produk.KODE_BARANG = tmp_trs.barang_id ');
        $this->db->where('user_id', $user);
        return $this->db->get()->result_array();
    }

    function delete_keranjang($id)
    {
        
        //cek barang
        $brg        = $this->db->get_where('tmp_trs', array('id' => $id))->result();
        $barang_id  = $brg[0]->barang_id;
        $stoktmp    = $brg[0]->qty;
        
        //menambah_stok stok
        $barang     = $this->db->get_where('produk', array('KODE_BARANG' => $barang_id))->result();
        $stok       = $barang[0]->STOK+$stoktmp;

        //proses update stok barang
        $data = array(
            'STOK' => $stok
        );

        $where = array(
            'KODE_BARANG' => $barang_id
        );
        $this->db->update('produk', $data, $where);
        
        //delete tmp
        $this->db->delete('tmp_trs', array('id' => $id)); 
    }

    function checkout()
    {
        //cek transaksi terakhir
        $this->db->select('id');
        $this->db->from('transaksi');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $cek    = $this->db->get()->result();
       
        if(empty($cek)){
            $kode = 1;
        }else{
            $kode   = $cek[0]->id+1;
        }
        $idlast = str_pad($kode, 3, '0', STR_PAD_LEFT);
        
        $user   = $_SESSION['id'];
        $tgl    = date('Y-m-d');
        $tanggal= date('Ymd');
        $kode   = "INV/$tanggal/$idlast";
        
        $data = array(
            'customer_id'    => $user,
            'tanggal'        => $tgl,
            'kode_transaksi' => $kode,
            'status'         => 'P'
        );
        $this->db->insert('transaksi', $data);
        $idnya = $this->db->insert_id();

        // insert detail
        $this->insertdatadetail($idnya);
        return $idnya;
    }

    function insertdatadetail($idnya)
    {
        $user   = $_SESSION['id'];

        $query = $this->db->query("INSERT transaksi_detail (transaksi_id, produk_id, jumlah)
                           SELECT '$idnya', barang_id, qty
                           FROM tmp_trs
                           WHERE user_id = $user");


        $this->db->delete('tmp_trs', array('user_id' => $user));
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
    function gantipass($gantipass,$where)
    {        
        $this->db->update('tbl_member', $gantipass,$where);
    }
    function member($id)
    {
        return $this->db->get_where('tbl_member', array('id' => $id))->result();
    }
    function edit_profile($id)
    {
        return $this->db->get_where('tbl_member', array('id' => $id))->result();
    }
    function saveedit_profile()
    {
        $nama_lengkap = $this->input->post('nama_lengkap');
        $no_hp = $this->input->post('no_hp');
        $alamat_lengkap = $this->input->post('alamat_lengkap');
        $email = $this->input->post('email');
        $id = $this->session->userdata('id');

        $data = array(
            'nama_lengkap' => $nama_lengkap,
            'no_hp' => $no_hp,
            'alamat_lengkap' => $alamat_lengkap,
            'email' => $email
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_member', $data);
    }
    function updateprofildata($folder)
    {
        return $this->db->get_where('tbl_member', array('id' => $id))->result();
    }

    function updateprofil($data, $where)
    {
       
        $this->db->update('tbl_member', $data, $where);

    }
     function edit_keranjang($id)
    {
        return $this->db->get_where('tmp_trs', array('id' => $id))->result();
    }
    function ubahqty_m($id)
    { 
        $qty = $this->input->post('qty');
        $data = array(
            'qty' => $qty
        );
        $this->db->where('id', $id);
        $this->db->update('tmp_trs', $data);
    }

    function detailuser()
    {
        $userid = $this->session->userdata('id');

        //cek data user
        return $this->db->get_where('tbl_member', array('id' => $userid))->result();
    }
     function detailtrs($id)
     {
         return $this->db->get_where('transaksi', array('id' => $id))->result();
     }
     function searchdatatmp($id)
    {
        $this->db->join('tbl_stok', 'tbl_stok.KODE_BARANG = tmp_trs.barang_id');
        return $this->db->get_where('tmp_trs', array('user_id' => $id))->result();
    }
}
