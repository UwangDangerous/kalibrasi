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
            $this->db->join('_alat', 'alat.id_ma = _alat.id_ma') ;
            $this->db->join('_tipe_alat', 'alat.id_ta = _tipe_alat.id_ta', 'left') ;
            return $this->db->get('alat')->result_array() ;
        }
        public function getDataAlatEdit($id)
        {
            $this->db->where('id_alat', $id) ;
            $this->db->join('lab', 'lab.id_lab = alat.id_lab') ;
            $this->db->join('admin','admin.id_admin = alat.id_admin') ;
            $this->db->join('unit', 'unit.id_unit = admin.id_unit') ;
            $this->db->join('_alat', 'alat.id_ma = _alat.id_ma') ;
            $this->db->join('_tipe_alat', 'alat.id_ta = _tipe_alat.id_ta', 'left') ;
            return $this->db->get('alat')->row_array() ;
        }

        public function getDataAlatKey($key)
        {
            $this->db->where('kode_alat', $key) ;
            $this->db->join('lab', 'lab.id_lab = alat.id_lab') ;
            $this->db->join('admin','admin.id_admin = alat.id_admin') ;
            $this->db->join('_kota','_kota.id_kota = admin.id_kota') ;
            $this->db->join('_provinsi','_provinsi.id_prov = _kota.id_prov') ;
            $this->db->join('unit', 'unit.id_unit = admin.id_unit') ;
            $this->db->join('_alat', 'alat.id_ma = _alat.id_ma') ;
            $this->db->join('_tipe_alat', 'alat.id_ta = _tipe_alat.id_ta', 'left') ;
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

            if($this->input->post('id_ta', true) == null) {
                $id_ta = 0;
            }else{
                $id_ta = $this->input->post('id_ta', true) ;
            }
            $kode = substr(md5(date("Y-m-d G:i:s")),0,15);
            $query = [
                'id_admin' => $this->input->post('id_admin', true) ,
                'id_ma' => $this->input->post('id_ma', true) ,
                'id_ta' => $id_ta ,
                'merek' => $this->input->post('merek', true) ,
                'tipe' => $this->input->post('tipe', true) ,
                'no_seri' => $this->input->post('no_seri', true) ,
                'no_bmn' => $this->input->post('no_bmn', true) ,
                'id_lab' => $this->input->post('id_lab', true) ,
                'lokasi_alat' => $this->input->post('lokasi_alat', true) ,
                'daya_listrik' => $this->input->post('daya_listrik', true) ,
                'tahun' => $tahun,
                'perolehan' => $this->input->post('perolehan'),
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
            // die ;

            $this->QRCode_model->qrGenerator($kode) ;
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
            redirect("admin/alat") ;
        }




        public function getDataRiwayatPemakaian($id){
            $this->db->where('id_alat', $id) ;
            $this->db->order_by('id_rp', 'desc') ;
            return $this->db->get('riwayat_pemakaian')->result_array() ;
        }
        public function getDataRiwayatKalibrasi($id){
            $this->db->where('id_alat', $id) ;
            $this->db->order_by('id_rk', 'desc') ;
            return $this->db->get('riwayat_kalibrasi')->result_array() ;
        }

    }

?>