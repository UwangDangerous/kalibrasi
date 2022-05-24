<?php 

    class Admin_model extends CI_Model{
        public function getDataAdmin()
        {
            $this->db->join('_kota', '_kota.id_kota = admin.id_kota') ;
            $this->db->join('_provinsi', '_provinsi.id_prov = _kota.id_prov') ;
            $this->db->join('unit', 'unit.id_unit = admin.id_unit') ;
            $this->db->select('unit.id_unit as id_unit, nama_admin, nama_unit, nama_pj, id_admin, alamat, nama_kota, nama_prov, telp_pj,
                                 nama_kepala, email') ;
            return $this->db->get('admin')->result_array() ;
        }

    }

?>