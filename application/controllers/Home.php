<?php 

    class Home extends CI_Controller{

        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('Date_model') ;
            $this->load->model('Lab_model') ;
        } 

        public function index() {
            // if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Kalibrasi - PPPOMN '; 
                $data['brand'] =  $this->db->get_where('_utility',['penggunaan' => 'brand'])->row_array()['judul'];
                $data['jumbotron'] =  $this->db->get_where('_utility',['penggunaan' => 'jumbotron'])->row_array();
                $data['about'] =  $this->db->get_where('_utility',['penggunaan' => 'about'])->row_array();
                $data['scan'] =  $this->db->get_where('_utility',['penggunaan' => 'scan'])->result_array();
                

                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('no_telp', 'Nomor Telpon', 'required|numeric');
                $this->form_validation->set_rules('pesan', 'Pesan', 'required');

                if($this->form_validation->run() == FALSE) {
                    $this->load->view('temp/landing/header', $data) ;
                    $this->load->view('home/index') ;
                    $this->load->view('temp/landing/footer') ;
                }else{
                    $this->Lab_model->addPesan() ;
                }
        }

        public function scan_kamera()
        {
            $this->load->view('scan_qr') ;
        }

        public function riwayatPenggunaanAlat()
        {
            if($this->input->get('k')){
                $key = $this->input->get('k') ;
                $data['judul'] = 'Kalibrasi - PPPOMN '; 
                $data['brand'] =  $this->db->get_where('_utility',['penggunaan' => 'brand'])->row_array()['judul'];

                $this->load->model('Alat_model') ;
                $data['alat'] = $this->Alat_model->getDataAlatKey($key) ;

                $this->load->view('temp/landing/header', $data) ;
                $this->load->view('home/riwayat') ;
                $this->load->view('temp/landing/footer') ;
            }else{
                $this->session->set_flashdata('pesan', 'Tidak Ada Akses') ;
                redirect("home#scan") ;
            }
        }


        public function riwayatPemakaian($id)
        {
            $data['id'] = $id ;
            $this->db->where('id_alat', $id) ;
            $this->db->order_by('id_rp', 'desc') ;
            $data['pemakaian'] = $this->db->get('riwayat_pemakaian')->result_array() ;
            
            $this->load->view('home/riwayat/pemakaian', $data) ;
            
        }

        public function tambahRP($id)
        {
            $this->form_validation->set_rules('tanggal', 'Tanggal Pemakaian', 'required');
            $this->form_validation->set_rules('pemakaian', 'Pemakaian Alat', 'required');
            $this->form_validation->set_rules('mulai', 'Jam Mulai', 'required');
            $this->form_validation->set_rules('selesai', 'Jam Selesai', 'required');
            $this->form_validation->set_rules('kondisi', 'Kondisi Alat', 'required');
            $this->form_validation->set_rules('pengguna', 'Nama Pengguna', 'required');
            // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if($this->form_validation->run() == FALSE) {
                // $this->load->view('home/riwayat/pemakaian', $data) ;
                $this->riwayatPemakaian($id) ;
            }else{

                $query = [
                    'tanggal' => $this->input->post('tanggal') ,
                    'pemakaian' => $this->input->post('pemakaian') ,
                    'mulai' => $this->input->post('mulai') ,
                    'selesai' => $this->input->post('selesai') ,
                    'kondisi' => $this->input->post('kondisi') ,
                    'pengguna' => $this->input->post('pengguna') ,
                    'keterangan' => $this->input->post('keterangan') ,
                    'id_alat' => $id
                ] ;
        
                if($this->db->insert('riwayat_pemakaian', $query)) {
                    $pesan = [
                        'pesan_rp' => 'Data Berhasil Disimpan',
                        'warna_rp' => 'success'
                    ] ;
                }else{
                    $pesan = [
                        'pesan_rp' => 'Data Gagal Disimpan',
                        'warna_rp' => 'danger'
                    ] ;
                }
                
                $this->session->set_flashdata($pesan) ;
                $this->riwayatPemakaian($id) ;
                
            }
        }

        public function riwayatKalibrasi($id)
        {
            $data['id'] = $id ;
            $this->db->where('id_alat', $id) ;
            $this->db->order_by('id_rk', 'desc') ;
            $data['kalibrasi'] = $this->db->get('riwayat_kalibrasi')->result_array() ;
            
            $this->load->view('home/riwayat/kalibrasi', $data) ;
        }
        
        public function tambahRK($id)
        {
            $this->form_validation->set_rules('no_lhk', 'Nomor LHK', 'required');
            $this->form_validation->set_rules('no_sertifikat', 'Nomor Sertifikat', 'required');
            $this->form_validation->set_rules('hasil', 'Hasil Kalibrasi', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->riwayatKalibrasi($id) ;
            }else{
                $query = [
                    'no_lhk' => $this->input->post('no_lhk') ,
                    'no_sertifikat' => $this->input->post('no_sertifikat') ,
                    'hasil' => $this->input->post('hasil') ,
                    'keterangan' => $this->input->post('keterangan') ,
                    'tanggal' => $this->input->post('tanggal') ,
                    'id_alat' => $id
                ] ;
        
                if($this->db->insert('riwayat_kalibrasi', $query)) {
                    $pesan = [
                        'pesan_rk' => 'Data Berhasil Disimpan',
                        'warna_rk' => 'success'
                    ] ;
                }else{
                    $pesan = [
                        'pesan_rk' => 'Data Gagal Disimpan',
                        'warna_rk' => 'danger'
                    ] ;
                }
                
                $this->session->set_flashdata($pesan) ;

                // var_dump($query) ;
                $this->riwayatKalibrasi($id) ;
                
            }
        }



    }
?>

