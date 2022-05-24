<?php 

    class Alat_model extends CI_Model{
        public function getDataAlat()
        {
            $this->db->join('_kota', '_kota.id_kota = alat.id_kota') ;
            $this->db->join('_provinsi', '_provinsi.id_prov = _kota.id_prov') ;
            $this->db->join('lab', 'lab.id_lab = alat.id_lab') ;

            $this->db->join('admin','admin.id_admin = alat.id_admin') ;
            $this->db->join('unit', 'unit.id_unit = admin.id_unit') ;
            // $this->db->select('unit.id_unit as id_unit, nama_alat, nama_unit, nama_pj, id_alat, alamat, nama_kota, nama_prov, telp_pj,
            //                      nama_kepala, email') ;
            return $this->db->get('alat')->result_array() ;
        }

        public function getDataAlatEdit($id) 
        {
            // $this->db->where('id_admin', $id) ;
            // $this->db->join('_kota', '_kota.id_kota = admin.id_kota') ;
            // $this->db->join('_provinsi', '_provinsi.id_prov = _kota.id_prov') ;
            // $this->db->join('unit', 'unit.id_unit = admin.id_unit') ;
            // return $this->db->get('admin')->row_array() ;
        }

        public function addAlat()
        {

            $query = [
                'nama_admin' => $this->input->post('nama_admin') ,
                'id_unit' => $this->input->post('id_unit') ,
                'id_kota' => $this->input->post('id_kota') ,
                'alamat' => $this->input->post('alamat') ,
                'nama_pj' => $this->input->post('nama_pj') ,
                'telp_pj' => $this->input->post('telp_pj') ,
                'email' => $this->input->post('email') ,
                'nama_kepala' => $this->input->post('nama_kepala') ,
                'username' => $this->input->post('username') ,
                'password' => md5(sha1('p@ssw0rd')) 
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

        public function editAlat($id)
        {

            $query = [
                'nama_admin' => $this->input->post('nama_admin') ,
                'id_unit' => $this->input->post('id_unit') ,
                'id_kota' => $this->input->post('id_kota') ,
                'alamat' => $this->input->post('alamat') ,
                'nama_pj' => $this->input->post('nama_pj') ,
                'telp_pj' => $this->input->post('telp_pj') ,
                'email' => $this->input->post('email') ,
                'nama_kepala' => $this->input->post('nama_kepala') ,
                'username' => $this->input->post('username') ,
                'password' => md5(sha1('p@ssw0rd')) 
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