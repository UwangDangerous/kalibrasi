<?php 

    class Pelaksana_model extends CI_Model{
        public function getDataPelaksana()
        {
            $id = $this->session->userdata('key_kalibrasi');
            if($id != 1){
                $this->db->where('id_admin', $id) ;
            }else{
                $this->db->join('admin', 'admin.id_admin = pelaksana.id_admin') ;
                $this->db->join('unit', 'unit.id_unit = admin.id_unit') ;
                $this->db->select('status,pelaksana.telepon as telepon, id_pelaksana, nama_pelaksana, pelaksana.email, satker, bagian, nama_admin, nama_unit, pelaksana.username as username') ;
            }
            return $this->db->get('pelaksana')->result_array() ;
        }

        public function getDataPelaksanaForEdit($id){
            return $this->db->get('pelaksana',['id_pelaksana' => $id])->row_array() ;
        }

        public function addPelaksana()
        {
            $pw = md5(sha1('P$w0rd')) ;
            $us = substr(md5(date("Ymd Gis")),0,10 ) ;
            $query = [
                'nip' => $this->input->post('nip') ,
                'nama_pelaksana' => $this->input->post('nama_pelaksana') ,
                'email' => $this->input->post('email') ,
                'telepon' => $this->input->post('telepon') ,
                'satker' => $this->input->post('satker') ,
                'bagian' => $this->input->post('bagian') ,
                'username' => $us ,
                'password' => $pw ,
                'status' => 1,
                'id_admin' => 1
            ] ;
            
            if($this->db->insert('pelaksana', $query)) {
                $pesan = [
                    'pesan' => 'Data User Berhasil Disimpan' ,
                    'warna' => 'success' 
                ] ;
            }else{
                $pesan = [
                    'pesan' => 'Data User Gagal Disimpan',
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("admin/pelaksana") ;
        }

        public function editPelaksana($id)
        {
            $query = [
                'nama_pelaksana' => $this->input->post('nama_pelaksana') ,
                'telepon' => $this->input->post('telepon'),
                'satker' => $this->input->post('satker') ,
                'bagian' => $this->input->post('bagian') 
            ] ;

            if($this->input->post('nip') != '') {
                $query[] = $this->input->post('nip') ;
            }

            if($this->input->post('email') != '') {
                $query[] = $this->input->post('email') ;
            }
            
            $this->db->where('id_pelaksana', $id) ;
            $this->db->set($query) ;
            if($this->db->update('pelaksana')) {
                $pesan = [
                    'id' => $id,
                    'pesan' => 'Data User Berhasil Dihapus' ,
                    'warna' => 'success' 
                ] ;
            }else{
                $pesan = [
                    'pesan' => 'Data User Gagal Dihapus',
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("admin/pelaksana") ;
        }

        public function activePelaksana($id)
        {
            $this->db->where('id_pelaksana', $id) ;
            $this->db->set('status', 1) ;
            if($this->db->update('pelaksana')) {
                $pesan = [
                    'id' => $id,
                    'pesan' => 'Berhasil Aktifkan User' ,
                    'warna' => 'success' 
                ] ;
            }else{
                $pesan = [
                    'pesan' => 'Gagal Aktifkan User',
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("admin/pelaksana") ;
        }

        public function resetPasswordUser($id)
        {
            $this->db->where('id_pelaksana', $id) ;
            $this->db->set('password', md5(sha1('P$w0rd'))) ;
            if($this->db->update('pelaksana')) {
                $pesan = [
                    'id' => $id,
                    'pesan' => 'Password User Berhasil Di Reset' ,
                    'warna' => 'success' 
                ] ;
            }else{
                $pesan = [
                    'pesan' => 'Password User Gagal Di Reset',
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("admin/pelaksana") ;
        }

        public function deletePelaksana($id)
        {
            
            $this->db->where('id_pelaksana', $id) ;
            if($this->db->delete('pelaksana')) {
                $pesan = [
                    'pesan' => 'Data User Berhasil Dihapus' ,
                    'warna' => 'success' 
                ] ;
            }else{
                $pesan = [
                    'pesan' => 'Data User Gagal Dihapus',
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("admin/pelaksana") ;
        }
    }

?>