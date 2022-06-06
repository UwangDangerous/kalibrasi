<?php 

    class Masteralat_model extends CI_Model{
        public function getDataAlat()
        {
            return $this->db->get('_alat')->result_array() ;
        }

        public function getDataAlatForEdit($id) 
        {
            return $this->db->get_where('_alat', ['id_ma' => $id])->row_array() ;
        }

        public function addAlat()
        {
            $this->db->order_by('id_ma', 'desc') ;
            $id = $this->db->get('_alat')->row_array()['id_ma'] + 1 ;
            if($this->db->insert('_alat', ['nama_ma' => $this->input->post('nama_ma', true)]) ) {
                $pesan = [
                    'pesan' => 'Data Berhasil Disimpan' ,
                    'warna' => 'success',
                    'id' => $id
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Disimpan' ,
                    'warna' => 'danger'
                ];
            }
            
            $this->session->set_flashdata($pesan) ;
            redirect("admin/masteralat"); 
        }

        public function editAlat($id)
        {
            $this->db->where('id_ma', $id) ;
            if($this->db->update('_alat', ['nama_ma' => $this->input->post('nama_ma', true)]) ) {
                $pesan = [
                    'pesan' => 'Data Berhasil Diubah' ,
                    'warna' => 'success',
                    'id' => $id
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Diubah' ,
                    'warna' => 'danger'
                ];
            }
            
            $this->session->set_flashdata($pesan) ;
            redirect("admin/masteralat"); 
        }

        public function deleteAlat($id)
        {
            $this->db->where('id_ma', $id) ;
            if($this->db->delete('_alat') ) {
                $pesan = [
                    'pesan' => 'Data Berhasil Dihapus' ,
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Dihapus' ,
                    'warna' => 'danger'
                ];
            }
            
            $this->session->set_flashdata($pesan) ;
            redirect("admin/masteralat"); 
        }




        // =================================================================================================
        public function getDataTipe($ma)
        {
            $this->db->join('_alat', '_alat.id_ma = _tipe_alat.id_ma') ;
            return $this->db->get_where('_tipe_alat', ['_alat.id_ma' => $ma])->result_array() ;
        }
    }

?>