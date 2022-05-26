<?php 

    class Alat_model extends CI_Model{
        public function getDataAlat()
        {
            if($this->session->userdata('key_kalibrasi') != 1){
                $this->db->where('alat.id_admin', $this->session->userdata('key_kalibrasi')) ;
            } 
            
            $this->db->join('lab', 'lab.id_lab = alat.id_lab') ;

            $this->db->join('admin','admin.id_admin = alat.id_admin') ;
            $this->db->join('unit', 'unit.id_unit = admin.id_unit') ;
            return $this->db->get('alat')->result_array() ;
        }
        public function getDataAlatEdit($id)
        {
            $this->db->where('id_alat', $id) ;
            $this->db->join('lab', 'lab.id_lab = alat.id_lab') ;
            $this->db->join('admin','admin.id_admin = alat.id_admin') ;
            $this->db->join('unit', 'unit.id_unit = admin.id_unit') ;
            return $this->db->get('alat')->row_array() ;
        }

        public function addAlat()
        {
            $tahun = $this->input->post('tahun', true)  ;
            if(strlen($tahun) != 4){
                $this->session->set_flashdata(
                    [
                        'pesan' => "Gagal Disimpan - Kesalahan Saat input tahun <b>($tahun)</b>",
                        'warna' => 'danger'
                    ] 
                );
                redirect("admin/alat") ;
            } 

            $kode = substr(md5(date("Y-m-d G:i:s")),0,15);

            $query = [
                'id_admin' => $this->input->post('id_admin', true) ,
                'nama_alat' => $this->input->post('nama_alat', true) ,
                'merek' => $this->input->post('merek', true) ,
                'tipe' => $this->input->post('tipe', true) ,
                'no_seri' => $this->input->post('no_seri', true) ,
                'no_bmn' => $this->input->post('no_bmn', true) ,
                'id_lab' => $this->input->post('id_lab', true) ,
                'lokasi_alat' => $this->input->post('lokasi_alat', true) ,
                'daya_listrik' => $this->input->post('daya_listrik', true) ,
                'tahun' => $tahun,
                'kondisi' => $this->input->post('kondisi', true) ,
                'no_serti' => $this->input->post('no_serti', true) ,
                'kode_alat' => $kode
            ];

            if($this->db->insert('alat', $query))
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

            $this->QRCode_model->setQR($kode) ;
            $this->session->set_flashdata($pesan) ;
            redirect("admin/alat") ;
        }

        public function editAlat($id)
        {

            $tahun = $this->input->post('tahun', true)  ;
            if(strlen($tahun) != 4){
                $this->session->set_flashdata(
                    [
                        'pesan' => "Gagal Disimpan - Kesalahan Saat input tahun <b>($tahun)</b>",
                        'warna' => 'danger'
                    ] 
                );
                redirect("admin/alat") ;
            } 


            $query = [
                'id_admin' => $this->input->post('id_admin', true) ,
                'nama_alat' => $this->input->post('nama_alat', true) ,
                'merek' => $this->input->post('merek', true) ,
                'tipe' => $this->input->post('tipe', true) ,
                'no_seri' => $this->input->post('no_seri', true) ,
                'no_bmn' => $this->input->post('no_bmn', true) ,
                'id_lab' => $this->input->post('id_lab', true) ,
                'lokasi_alat' => $this->input->post('lokasi_alat', true) ,
                'daya_listrik' => $this->input->post('daya_listrik', true) ,
                'tahun' => $tahun,
                'kondisi' => $this->input->post('kondisi', true) ,
                'no_serti' => $this->input->post('no_serti', true) 
            ];

            $this->db->where('id_alat', $id) ;
            $this->db->set($query) ;
            if($this->db->update('alat'))
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
            redirect("admin/alat") ;
        }

    }

?>