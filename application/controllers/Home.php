<?php 

    class Home extends CI_Controller{

        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
        } 

        public function index() {
            // if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Kalibrasi - PPPOMN '; 
                $data['brand'] =  $this->db->get_where('_utility',['penggunaan' => 'brand'])->row_array()['judul'];
                $data['jumbotron'] =  $this->db->get_where('_utility',['penggunaan' => 'jumbotron'])->row_array();
                $data['about'] =  $this->db->get_where('_utility',['penggunaan' => 'about'])->row_array();
                $data['scan'] =  $this->db->get_where('_utility',['penggunaan' => 'scan'])->result_array();
                
                $this->load->view('temp/landing/header', $data) ;
                $this->load->view('home/index') ;
                $this->load->view('temp/landing/footer') ;
        }

        public function scan_kamera()
        {
            $this->load->view('scan_qr') ;
        }

        public function riwayatPenggunaanAlat()
        {
            if($this->input->get('k')){
                $data['judul'] = 'Kalibrasi - PPPOMN '; 
                $data['brand'] =  $this->db->get_where('_utility',['penggunaan' => 'brand'])->row_array()['judul'];
                
                $this->load->view('temp/landing/header', $data) ;
                $this->load->view('home/riwayat') ;
                $this->load->view('temp/landing/footer') ;
            }else{
                $this->session->set_flashdata('pesan', 'Tidak Ada Akses') ;
                redirect("home#scan") ;
            }
        }


    }
?>

