<?php 

    class Login_model extends CI_Model{

        public function cekLogin($name, $pass)
        {
            $this->db->where('username', $name) ;
            $this->db->or_where('email', $name) ;
            $this->db->join('unit','unit.id_unit = admin.id_unit') ;
            $data = $this->db->get('admin')->row_array() ;
            // var_dump($data['nama_lain']) ; die ;
            if($data != null) {
                $this->session->set_userdata( [
                    'key_kalibrasi' => $data['id_admin'] ,
                    'nama_kalibrasi' => $data['nama_admin'] ,
                    'unit_kalibrasi' => $data['nama_unit'] , 
                    'other_kalibrasi' => $data['nama_lain'] , 
                    'pj_kalibrasi' => $data['nama_pj'] 
                ] );
                redirect("dashboard") ;
            }else{
                $this->session->set_flashdata('login', 'Username atau Password Salah, Silahkan Coba Lagi') ;
                redirect("login") ;
            }

        }
    }


?>