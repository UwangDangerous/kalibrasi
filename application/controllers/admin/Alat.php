<?php 

    class Alat extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('Alat_model') ;
            $this->load->model('Admin_model') ;
            $this->load->model('Lab_model') ;
            $this->load->model('QRCode_model') ;
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
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/alat"> Daftar Alat </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 

                $data['admin'] = $this->Admin_model->getDataAdmin() ;
                $data['lab'] = $this->Lab_model->getDataLab() ;

                $this->form_validation->set_rules('id_admin', 'Admin', 'required');
                $this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');
                $this->form_validation->set_rules('merek', 'Merek', 'required');
                $this->form_validation->set_rules('tipe', 'Tipe', 'required');
                $this->form_validation->set_rules('no_seri', 'Nomor Seri', 'required');
                $this->form_validation->set_rules('id_lab', 'Laboratorium', 'required');
                $this->form_validation->set_rules('lokasi_alat', 'Lokasi Alat', 'required');
                $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
                $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/alat/tambah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Alat_model->addAlat() ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function ubah($id)
        {
            if( $this->session->userdata('key_kalibrasi') != null ){
                $data['judul'] = 'Tambah Data Alat '; 
                $data['header'] = 'Tambah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/alat"> Daftar Alat </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 

                $data['alat'] = $this->Alat_model->getDataAlatEdit($id) ;
                $data['admin'] = $this->Admin_model->getDataAdmin() ;
                $data['lab'] = $this->Lab_model->getDataLab() ;

                $this->form_validation->set_rules('id_admin', 'Admin', 'required');
                $this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');
                $this->form_validation->set_rules('merek', 'Merek', 'required');
                $this->form_validation->set_rules('tipe', 'Tipe', 'required');
                $this->form_validation->set_rules('no_seri', 'Nomor Seri', 'required');
                $this->form_validation->set_rules('id_lab', 'Laboratorium', 'required');
                $this->form_validation->set_rules('lokasi_alat', 'Lokasi Alat', 'required');
                $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
                $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/alat/ubah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Alat_model->editAlat($id) ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function hapus($id) 
        {
            $this->db->where('id_alat', $id) ;
            if($this->db->delete('alat')) {
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
            redirect("admin/alat") ;
        }
    }

?>