<?php 

    class Admin extends CI_Controller{
        public function index() {
            if( $this->session->userdata('key_kalibrasi') != null ){
                $data['judul'] = 'Data Admin '; 
                $data['header'] = 'Data Admin'; 
                $data['bread'] = 'Data Admin'; 
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/admin/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }
    }

?>