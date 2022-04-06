<?php 

class Kategori_model extends CI_Model {
    function daftar_kategori()
    {
       return $this->db->get('kategori')->result();
    }

    function simpankategori()
    {
        $nama_kategori = $this->input->post('nama_kategori');

        $data = array(
            'nama_kategori' => $nama_kategori
        );
        $this->db->insert('kategori', $data);
    }

    function hapuskategori($id)
    {
        $this->db->delete('kategori',array('id'=> $id));
    }
    
     function editkategori($id)
     {
        return $this->db->get_where('kategori', array('id' => $id))->result();
     }

     function saveedit_kategori()
     {
         $nama_kategori = $this->input->post('nama_kategori');
         $id = $this->input->post('id');

         $data= array(
             'nama_kategori' => $nama_kategori
         );
         $this->db->where('id', $id);
         $this->db->update('kategori', $data);
     }

     function kategoriproduk($id)
     {
         return $this->db->get_where('kategori', array('id' => $id))->result();
     }

     
}

