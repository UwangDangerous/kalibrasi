<?php 

    class Unit extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('Unit_model') ;
            $this->load->library('form_validation') ;
        }

        public function index()
        {
            if( $this->session->userdata('key_kalibrasi') != null ){
                $data['judul'] = 'Tipe Unit '; 
                $data['header'] = 'Tipe Unit'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Unit</li>
                '; 

                $data['unit'] = $this->Unit_model->getDataUnit() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/unit/index') ;
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
                $data['judul'] = 'Tipe Unit '; 
                $data['header'] = 'Tambah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/unit"> Unit </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 

                $this->form_validation->set_rules('nama_unit', 'Nama Unit', 'required');
                $this->form_validation->set_rules('nama_lain', 'Nama Lain', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/unit/tambah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Unit_model->addUnit() ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function ubah($id)
        {
            if( $this->session->userdata('key_kalibrasi') != null ){
                $data['judul'] = 'Tipe Unit '; 
                $data['header'] = 'Ubah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/unit"> Unit </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
                '; 

                
                $data['unit'] = $this->Unit_model->getDataEditUnit($id) ;

                $this->form_validation->set_rules('nama_unit', 'Nama Unit', 'required');
                $this->form_validation->set_rules('nama_lain', 'Nama Lain', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/unit/ubah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Unit_model->editUnit($id) ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function hapus($id)
        {
            $this->db->where('id_unit', $id) ;
            if($this->db->delete('unit')) {
                $pesan = [
                    'pesan' => 'Data Berhasil Dihapus',
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Dihapus',
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect("admin/unit") ;
        }
    }

?>