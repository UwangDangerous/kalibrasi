<?php 

    class Lab_model extends CI_Model{
        public function getDataLab()
        {
            return $this->db->get('lab')->result_array();
        } 

        public function getDataEditLab($id)
        {
            $this->db->where('id_lab', $id) ;
            return $this->db->get('lab')->row_array() ;
        }

        public function addLab()
        {
            $query = [
                'nama_lab' => $this->input->post('nama_lab', true) 
            ];
            
            if($this->db->insert('lab', $query)) {
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
            redirect("admin/lab") ;
        }

        public function editLab($id)
        {
            $query = [
                'nama_lab' => $this->input->post('nama_lab', true) 
            ];
            
            $this->db->where('id_lab', $id) ;
            if($this->db->update('lab', $query)) {
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
            redirect("admin/lab") ;
        }
    }

?>