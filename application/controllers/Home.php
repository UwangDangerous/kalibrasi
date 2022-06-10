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
            $this->load->view('scan') ;
        }

        public function riwayatPenggunaanAlat()
        {
            if($this->session->userdata('key_pelaksana') != null) {
                if($this->input->get('k')){
                    $key = $this->input->get('k') ;
                    $data['judul'] = 'Kalibrasi - PPPOMN '; 
                    $data['brand'] =  $this->db->get_where('_utility',['penggunaan' => 'brand'])->row_array()['judul'];
                    $data['jumbotron'] =  $this->db->get_where('_utility',['penggunaan' => 'jumbotron'])->row_array();
    
                    $this->load->model('Alat_model') ;
                    $data['alat'] = $this->Alat_model->getDataAlatKey($key) ;
    
                    $this->load->view('temp/landing/header', $data) ;
                    $this->load->view('home/riwayat') ;
                    $this->load->view('temp/landing/footer') ;
                }else{
                    $pesan = [
                        'pesan_login' => 'scan terlebih dahulu' ,
                        'warna_login' => 'danger'
                    ];
                    $this->session->set_flashdata($pesan) ;
                    redirect("home#scan") ;
                }
            }else{
                $pesan = [
                    'pesan_login' => 'Silahkan Login Terlebih Dahulu' ,
                    'warna_login' => 'danger'
                ];
                $this->session->set_flashdata($pesan) ;
                redirect("") ;
            }
        }


        public function riwayatPemakaian($id)
        {
            $data['id'] = $id ;
            $this->db->where('id_alat', $id) ;
            $this->db->order_by('id_rp', 'desc') ;
            $this->db->join('pelaksana', 'pelaksana.id_pelaksana = riwayat_pemakaian.id_pelaksana') ;
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

            if($this->form_validation->run() == FALSE) {
                $this->riwayatPemakaian($id) ;
            }else{
                $query = [
                    'id_alat' => $id,
                    'tanggal' => $this->input->post('tanggal') ,
                    'mulai' => $this->input->post('mulai') ,
                    'selesai' => $this->input->post('selesai') ,
                    'pemakaian' => $this->input->post('pemakaian') ,
                    'id_pelaksana' => $this->session->userdata('key_pelaksana') ,
                    'kondisi' => $this->input->post('kondisi') ,
                    'keterangan' => $this->input->post('keterangan') 
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

        public function test_qr()
        {
            $this->load->view('test_qr') ;
        }


        // riwayat kalibrasi alat
        public function riwayaKalibrasiAlat()
        {
            if($this->session->userdata('key_pelaksana') != null) {
                if($this->input->get('k')){
                    $key = $this->input->get('k') ;
                    $data['judul'] = 'Kalibrasi - PPPOMN '; 
                    $data['brand'] =  $this->db->get_where('_utility',['penggunaan' => 'brand'])->row_array()['judul'];
                    $data['jumbotron'] =  $this->db->get_where('_utility',['penggunaan' => 'jumbotron'])->row_array();
    
                    $this->load->model('Alat_model') ;
                    $data['alat'] = $this->Alat_model->getDataAlatKey($key) ;
                    $data['id'] = $data['alat']['id_alat'] ;
                    $data['kode'] = $data['alat']['kode_alat'] ;
                    $data['kalibrasi'] = $this->riwayatKalibrasi($data['id']) ;
                    $data['kegiatan'] = $this->db->get('_kegiatan')->result_array() ;
    
                    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
                    $this->form_validation->set_rules('id_kegiatan', 'Kegiatan', 'required');
                    $this->form_validation->set_rules('hasil', 'Hasil Kalibrasi', 'required');
                    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
                    $this->form_validation->set_rules('no_serti', 'Nomor Sertifikat', 'required');

                    if($this->form_validation->run() == FALSE) {
                        $this->load->view('temp/landing/header', $data) ;
                        $this->load->view('home/riwayatAlat') ;
                        $this->load->view('temp/landing/footer') ;
                    }else{
                        $this->tambahRK($data['id'], $data['kode']) ;
                    }
                }else{
                    $pesan = [
                        'pesan_login' => 'scan terlebih dahulu' ,
                        'warna_login' => 'danger'
                    ];
                    $this->session->set_flashdata($pesan) ;
                    redirect("home#scan") ;
                }
            }else{
                $pesan = [
                    'pesan_login' => 'Silahkan Login Terlebih Dahulu' ,
                    'warna_login' => 'danger'
                ];
                $this->session->set_flashdata($pesan) ;
                redirect("") ;
            }
        }

        public function riwayatKalibrasi($id)
        {
            $data['id'] = $id ;
            $this->db->where('id_alat', $id) ;
            $this->db->order_by('id_rk', 'desc') ;
            return $this->db->get('riwayat_kalibrasi')->result_array() ;
        }
        
        public function tambahRK($id, $kode)
        {
            $upload = $this->Date_model->uploadFile('berkas_serti', 'assets/sertifikat_kalibrasi', 'pdf', "home/riwayaKalibrasiAlat?k=$kode#riwayat", 'rk') ;
            $query = [
                'id_alat' => $id ,
                'tanggal' => $this->input->post('tanggal') ,
                'id_kegiatan' => $this->input->post('id_kegiatan') ,
                'id_pelaksana' => $this->session->userdata('key_pelaksana') ,
                'hasil' => $this->input->post('hasil') ,
                'keterangan' => $this->input->post('keterangan') ,
                'no_serti' => $this->input->post('no_serti') ,
                'berkas_serti' => $upload
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
            redirect("home/riwayaKalibrasiAlat?k=$kode#riwayat") ; 
                
        }



    }
?>

