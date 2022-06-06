<?php 

    class Masteralat extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('Masteralat_model') ;
            $this->load->library('form_validation') ;
        }

        public function index()
        {
            if( $this->session->userdata('key_kalibrasi') != null ){
                $data['judul'] = 'Alat '; 
                $data['header'] = 'Alat'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Alat</li>
                '; 
                
                $data['alat'] = $this->Masteralat_model->getDataAlat() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/masteralat/index') ;
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
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/masteralat"> Data Alat </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 

                $this->form_validation->set_rules('nama_ma', 'Nama Alat', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/masteralat/tambah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Masteralat_model->addAlat() ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function Ubah($id)
        {
            if( $this->session->userdata('key_kalibrasi') != null ){
                $data['judul'] = 'Ubah Data Alat '; 
                $data['header'] = 'Ubah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/masteralat"> Data Alat </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
                '; 

                $data['alat'] = $this->Masteralat_model->getDataAlatForEdit($id)['nama_ma'] ;
                $this->form_validation->set_rules('nama_ma', 'Nama Alat', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/masteralat/ubah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Masteralat_model->editAlat($id) ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function hapus($id)
        {
            $this->Masteralat_model->deleteAlat($id) ;
        }


        // tipe jika ada
        public function tipe($id)
        {
            if( $this->session->userdata('key_kalibrasi') != null ){
                $data['judul'] = 'Tipe Alat '; 
                $data['header'] = 'Tipe Alat'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/masteralat"> Data Alat </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tipe Alat</li>
                '; 
                
                $data['ma'] = $id ;
                $data['tipe'] = $this->Masteralat_model->getDataTipe($id) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/masteralat/tipe') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function ubahtipe($ma, $id)
        {
            $this->db->where('id_ta', $id) ;
            if($this->db->update('_tipe_alat', ['nama_ta' => $this->input->post('nama_ta', true)]) ) {
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
            redirect("admin/masteralat/tipe/$ma"); 
        }

        public function tambahtipe($ma)
        {
            $this->db->order_by('id_ta', 'desc') ;
            $id = $this->db->get('_tipe_alat')->row_array()['id_ta'] + 1 ;

            $query = [
                'id_ma' => $ma ,
                'nama_ta' => $this->input->post('nama_ta', true)
            ] ;
            if($this->db->insert('_tipe_alat', $query) ) {
                $pesan = [
                    'pesan' => 'Data Berhasil Disimpan' ,
                    'warna' => 'success',
                    'id' => $id
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Disimpan' ,
                    'warna' => 'danger'
                ];
            }
            
            $this->session->set_flashdata($pesan) ;
            redirect("admin/masteralat/tipe/$ma"); 
        }

        public function hapustipe($ma , $id)
        {
            $this->db->where('id_ta', $id) ;
            if($this->db->delete('_tipe_alat') ) {
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
            redirect("admin/masteralat/tipe/$ma"); 
        }
    }

?>