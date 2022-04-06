<?php 

class User_model extends CI_Model {

   function gettransaksi()
   {
       $userid = $this->session->userdata('id'); 
        
       return  $this->db->get_where('transaksi', array('customer_id' => $userid))->result();
    }
    function getmember()
    {
        return $this->db->get('tbl_member')->result();
    }
}