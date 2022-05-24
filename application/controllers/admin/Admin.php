<?php 

    class Admin extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('Admin_model') ;
            $this->load->model('Unit_model') ;
            $this->load->model('Address_model') ;
            $this->load->library('form_validation') ;
        }

        public function index() {
            if( $this->session->userdata('key_kalibrasi') != null  && $this->session->userdata('key_kalibrasi') == 1){
                $data['judul'] = 'Data Admin '; 
                $data['header'] = 'Data Admin'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
                '; 
                
                $data['admin'] = $this->Admin_model->getDataAdmin() ;
                
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

        public function tambah()
        {
            if( $this->session->userdata('key_kalibrasi') != null && $this->session->userdata('key_kalibrasi') == 1  ){
                $data['judul'] = 'Tambah Data Admin '; 
                $data['header'] = 'Tambah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/admin"> Admin </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 

                $data['unit'] = $this->Unit_model->getDataUnit() ;
                $data['prov'] = $this->Address_model->getDataProv() ;
                $data['kota'] = $this->Address_model->getDataKota() ;

                $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
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

        public function ubah($id)
        {
            if( $this->session->userdata('key_kalibrasi') != null && $this->session->userdata('key_kalibrasi') == 1 ){
                $data['judul'] = 'Ubah Data Admin '; 
                $data['header'] = 'Ubah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/admin"> Admin </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
                '; 

                $data['unit'] = $this->Unit_model->getDataUnit() ;
                $data['prov'] = $this->Address_model->getDataProv() ;
                $data['kota'] = $this->Address_model->getDataKota() ;

                $data['admin'] = $this->Admin_model->getDataAdminEdit($id) ;

                $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
                $this->form_validation->set_rules('id_unit', 'Unit', 'required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                $this->form_validation->set_rules('id_prov', 'Provinsi', 'required');
                $this->form_validation->set_rules('id_kota', 'Kota', 'required');
                $this->form_validation->set_rules('nama_kepala', 'Nama Kepala / Ketua', 'required');
                $this->form_validation->set_rules('nama_pj', 'Nama Penanggung Jawab', 'required');
                $this->form_validation->set_rules('telp_pj', 'Nomor PJ', 'required|numeric');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('username', 'Nama Pengguna', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/admin/ubah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Admin_model->editAdmin($id) ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function hapus($id) 
        {
            $this->db->where('id_admin', $id) ;
            if($this->db->delete('admin')) {
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
            redirect("admin/admin") ;
        }
    }

?>