<?php 

    class Address_model extends CI_Model{
        public function getDataProv() 
        {
            $this->db->order_by('nama_prov', 'asc') ;
            return $this->db->get('_provinsi')->result_array() ;
        }

        public function getDataKota() 
        {
            $this->db->order_by('nama_prov', 'asc') ;
            $this->db->join('_provinsi', '_provinsi.id_prov = _kota.id_prov', 'inner') ;
            return $this->db->get('_kota')->result_array() ;
        }
    }

?>