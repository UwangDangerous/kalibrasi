<?php 

    class Alat extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('Alat_model') ;
            $this->load->model('Lab_model') ;
            $this->load->model('Address_model') ;
            $this->load->library('form_validation') ;
        }

        public function index() {
            if( $this->session->userdata('key_kalibrasi') != null ){
                $data['judul'] = 'Daftar Alat '; 
                $data['header'] = 'Daftar Alat'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Alat</li>
                '; 
                
                $data['alat'] = $this->Alat_model->getDataAlat() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/alat/index') ;
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
                $data['judul'] = 'Tambah Data Alat '; 
                $data['header'] = 'Tambah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/admin"> Alat </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 

                $data['prov'] = $this->Address_model->getDataProv() ;
                $data['kota'] = $this->Address_model->getDataKota() ;

                $this->form_validation->set_rules('nama_admin', 'Nama Alat', 'required');
                $this->form_validation->set_rules('id_unit', 'Unit', 'required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                $this->form_validation->set_rules('id_prov', 'Provinsi', 'required');
                $this->form_validation->set_rules('id_kota', 'Kota', 'required');
                $this->form_validation->set_rules('nama_kepala', 'Nama Kepala / Ketua', 'required');
                $this->form_validation->set_rules('nama_pj', 'Nama Penanggung Jawab', 'required');
                $this->form_validation->set_rules('telp_pj', 'Nomor PJ', 'required|numeric');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');
                $this->form_validation->set_rules('username', 'Nama Pengguna', 'required|is_unique[admin.username]');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/admin/tambah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Admin_model->addAdmin() ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }
    }

?>