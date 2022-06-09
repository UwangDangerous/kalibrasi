<?php 

    class Registrasi_model extends CI_Model{
        public function addRegist() 
        {
            $pw = md5(sha1($this->input->post('password1'))) ;
            $query = [
                'nip' => $this->input->post('nip') ,
                'nama_pelaksana' => $this->input->post('nama_pelaksana') ,
                'email' => $this->input->post('email') ,
                'telepon' => $this->input->post('telepon') ,
                'satker' => $this->input->post('satker') ,
                'bagian' => $this->input->post('bagian') ,
                'username' => $this->input->post('username') ,
                'password' => $pw ,
                'status' => 0,
                'id_admin' => 1
            ] ;
            
            if($this->db->insert('pelaksana', $query)) {
                $pesan = [
                    'pesan' => 'Registrasi Berhasil, Menunggu Admin Konfirmasi' ,
                    'warna' => 'success' 
                ] ;
            }else{
                $pesan = [
                    'pesan' => 'Gagal Registrasi <a href="'.base_url().'#contact">Hubungi Admin</a>',
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("registrasi#regist") ;

        }
    }

?>