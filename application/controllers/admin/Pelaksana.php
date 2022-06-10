<?php 

    class Pelaksana extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('Pelaksana_model') ;
            $this->load->library('form_validation') ;
        }

        public function index() 
        {
            if( $this->session->userdata('key_kalibrasi') != null){
                $data['judul'] = 'Pengguna dan Pelaksana Alat '; 
                $data['header'] = 'Pengguna dan Pelaksana Alat'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Pengguna dan Pelaksana Alat</li>
                '; 

                $data['pelaksana'] = $this->Pelaksana_model->getDataPelaksana() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/pelaksana/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function tambah()
        {
            if( $this->session->userdata('key_kalibrasi') != null ){
                $data['judul'] = 'Pengguna '; 
                $data['header'] = 'Tambah Pengguna'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/pelaksana"> Pengguna dan Pelaksana Alat </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
                '; 

                $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai / Kependudukan', 'required|is_unique[pelaksana.nip]');
                $this->form_validation->set_rules('nama_pelaksana', 'Nama Lengkap', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pelaksana.email]');
                $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|numeric');
                $this->form_validation->set_rules('satker', 'Satuan Kerja', 'required');
                $this->form_validation->set_rules('bagian', 'Bagian', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/pelaksana/tambah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Pelaksana_model->addPelaksana() ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function ubah($id)
        {
            if( $this->session->userdata('key_kalibrasi') != null ){
                $data['judul'] = 'Pengguna '; 
                $data['header'] = 'Tambah Pengguna'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/pelaksana"> Pengguna dan Pelaksana Alat </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
                '; 

                $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai / Kependudukan', 'is_unique[pelaksana.nip]');
                $this->form_validation->set_rules('nama_pelaksana', 'Nama Lengkap', 'required');
                $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[pelaksana.email]');
                $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|numeric');
                $this->form_validation->set_rules('satker', 'Satuan Kerja', 'required');
                $this->form_validation->set_rules('bagian', 'Bagian', 'required');

                $data['user'] = $this->Pelaksana_model->getDataPelaksanaForEdit($id) ;
                $data['id'] = $id ;

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/pelaksana/ubah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Pelaksana_model->editPelaksana($id) ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }
        
        public function hapus($id){ $this->Pelaksana_model->deletePelaksana($id) ; }

        public function reset_password($id){ $this->Pelaksana_model->resetPasswordUser($id) ; }
    }

?>