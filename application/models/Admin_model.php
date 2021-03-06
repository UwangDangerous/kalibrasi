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

        public function getDataAdminEdit($id) 
        {
            $this->db->where('id_admin', $id) ;
            $this->db->join('_kota', '_kota.id_kota = admin.id_kota') ;
            $this->db->join('_provinsi', '_provinsi.id_prov = _kota.id_prov') ;
            $this->db->join('unit', 'unit.id_unit = admin.id_unit') ;
            return $this->db->get('admin')->row_array() ;
        }

        public function addAdmin()
        {

            $query = [
                'nama_admin' => $this->input->post('nama_admin', true) ,
                'id_unit' => $this->input->post('id_unit', true) ,
                'id_kota' => $this->input->post('id_kota', true) ,
                'alamat' => $this->input->post('alamat', true) ,
                'nama_pj' => $this->input->post('nama_pj', true) ,
                'telp_pj' => $this->input->post('telp_pj', true) ,
                'email' => $this->input->post('email', true) ,
                'nama_kepala' => $this->input->post('nama_kepala', true) ,
                'username' => $this->input->post('username', true) ,
                'password' => md5(sha1('p@ssw0rd', true)) 
            ];

            if($this->db->insert('admin', $query))
            {
                $pesan = [
                    'pesan' => 'Data Berhasil Disimpan' ,
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Disimpan' ,
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("admin/admin") ;
        }

        public function editAdmin($id)
        {

            $query = [
                'nama_admin' => $this->input->post('nama_admin', true) ,
                'id_unit' => $this->input->post('id_unit', true) ,
                'id_kota' => $this->input->post('id_kota', true) ,
                'alamat' => $this->input->post('alamat', true) ,
                'nama_pj' => $this->input->post('nama_pj', true) ,
                'telp_pj' => $this->input->post('telp_pj', true) ,
                'email' => $this->input->post('email', true) ,
                'nama_kepala' => $this->input->post('nama_kepala', true) ,
                'username' => $this->input->post('username', true) ,
                'password' => md5(sha1('p@ssw0rd', true)) 
            ];

            $this->db->where('id_admin', $id) ;
            $this->db->set($query) ;
            if($this->db->update('admin'))
            {
                $pesan = [
                    'pesan' => 'Data Berhasil Diubah' ,
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Diubah' ,
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("admin/admin") ;
        }

    }

?>