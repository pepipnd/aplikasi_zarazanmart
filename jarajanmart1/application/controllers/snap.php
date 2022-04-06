<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods:GET,OPTIONS");

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-U6y3ZC350N116nFXps2RfcpX', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
		
    }

    public function index()
    {
		$data['midtrans'] = $this->db->get('midtrans')->result();
    	$this->load->view('checkout_snap', $data);
    }

    public function token()
    {
		//CEK LOGIN		
		$nama   = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp  = $this->input->post('no_hp');
		$email  = $this->input->post('email');
		$bayar  = $this->input->post('bayar');

		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $bayar, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $bayar,
		  'quantity' => 1,
		  'name' => "Pembayaran ZARAZAN MART"
		);

		// Optional
		

		// Optional
		$item_details = array ($item1_details);

		// Optional

		$billing_address = array(
		  'first_name'    => $nama,
		  'last_name'     => "",
		  'address'       => $alamat,
		  'city'          => "",
		  'postal_code'   => "",
		  'phone'         => $no_hp,
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => $nama,
		  'last_name'     => "",
		  'address'       => $alamat,
		  'city'          => "",
		  'postal_code'   => "",
		  'phone'         => $no_hp,
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $nama,
		  'email'         => $email,
		  'phone'         => $no_hp,
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;

    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'), true);
		$userid = $this->session->userdata('id');
		$tanggal = date('Y-m-d');
		$tgl = date('Ymd');
		//tambah data transaksi
		
		//insert ke transaksi
		$data = array(
			'customer_id' 		=> $userid,
			'tanggal' 		    => $tanggal,
			'kode_transaksi' 	=> $tgl.$result['order_id'],
			'status_code' 		=> $result['status_code'],
			'status_message' 	=> $result['status_message'],
			'transaction_id' 	=> $result['transaction_id'],
			'order_id' 			=> $result['order_id'],
			'gross_amount' 		=> $result['gross_amount'],
			'payment_type' 		=> $result['payment_type'],
			'transaction_time' 	=> $result['transaction_time'],
			'transaction_status'=> $result['transaction_status'],
			'bank'				=> $result['va_numbers'][0]['bank'],
			'va_number'			=> $result['va_numbers'][0]['va_number'],
			'pdf_url'			=> $result['pdf_url']
		);
		
		if($data){
			$simpan = $this->db->insert('transaksi', $data);
			$insertid = $this->db->insert_id();
		}
	    
		
		//insert ke detail transaksi
		$sql = "Insert into transaksi_detail(produk_id,jumlah,transaksi_id) 
		select barang_id, qty, $insertid
		from tmp_trs
		where user_id = $userid
		";

		$hasil = $this->db->query($sql);

		if($hasil){
		$this->load->model('Customer_model');
		$beli = $this->Customer_model->searchdatatmp($userid);
		
		foreach($beli as $bl){
			$kodebarang = $bl->barang_id;
			$qtybeli    = $bl->qty;
			$stokasal   = $bl->STOK_TERJUAL;


			$update = array(
				'STOK_TERJUAL' => $stokasal+$qtybeli
			);

			$where = array(
				'KODE_BARANG' => $kodebarang
			);

			$this->db->update('tbl_stok', $update, $where);

		}
			//delete tmp trs
			$where = array(
				'user_id' => $userid
			); 
			$this->db->delete('tmp_trs', $where);	
		}
			

		redirect('/');
	}
}
