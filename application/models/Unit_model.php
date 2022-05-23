<?php 

    class Unit_model extends CI_Model{
        public function getDataUnit()
        {
            return $this->db->get('unit')->result_array();
        } 

        public function getDataEditUnit($id)
        {
            $this->db->where('id_unit', $id) ;
            return $this->db->get('unit')->row_array() ;
        }

        public function addUnit()
        {
            $query = [
                'nama_unit' => $this->input->post('nama_unit', true) ,
                'nama_lain' => $this->input->post('nama_lain', true) 
            ];
            
            if($this->db->insert('unit', $query)) {
                $pesan = [
                    'pesan' => 'Data Berhasil Disimpan',
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Disimpan',
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("admin/unit") ;
        }

        public function editUnit($id)
        {
            $query = [
                'nama_unit' => $this->input->post('nama_unit', true) ,
                'nama_lain' => $this->input->post('nama_lain', true) 
            ];
            
            $this->db->where('id_unit', $id) ;
            if($this->db->update('unit', $query)) {
                $pesan = [
                    'pesan' => 'Data Berhasil Diubah',
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Diubah',
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("admin/unit") ;
        }
    }

?>