<?php 

    class Lab extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('Lab_model') ;
            $this->load->library('form_validation') ;
        }

        public function index()
        {
            if( $this->session->userdata('key_kalibrasi') != null && $this->session->userdata('key_kalibrasi') == 1 ){
                $data['judul'] = 'Laboratorium '; 
                $data['header'] = 'Laboratorium'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Lab</li>
                '; 

                $data['lab'] = $this->Lab_model->getDataLab() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/lab/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function tambah()
        {
            if( $this->session->userdata('key_kalibrasi') != null && $this->session->userdata('key_kalibrasi') == 1 ){
                $data['judul'] = 'Laboratorium '; 
                $data['header'] = 'Tambah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/lab"> Lab </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 

                $this->form_validation->set_rules('nama_lab', 'Nama Lab', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/lab/tambah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Lab_model->addLab() ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function ubah($id)
        {
            if( $this->session->userdata('key_kalibrasi') != null && $this->session->userdata('key_kalibrasi') == 1 ){
                $data['judul'] = 'Laboratorium '; 
                $data['header'] = 'Ubah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/lab"> Lab </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
                '; 

                
                $data['lab'] = $this->Lab_model->getDataEditLab($id) ;

                $this->form_validation->set_rules('nama_lab', 'Nama Lab', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/lab/ubah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Lab_model->editLab($id) ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function hapus($id)
        {
            $this->db->where('id_lab', $id) ;
            if($this->db->delete('lab')) {
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
            redirect("admin/lab") ;
        }




// ====================================================================================================================
        public function utility()
        {
            if( $this->session->userdata('key_kalibrasi') != null && $this->session->userdata('key_kalibrasi') == 1 ){
                $data['judul'] = 'Pengaturan Halaman Depan '; 
                $data['header'] = 'Pengaturan'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
                '; 

                $data['utility'] = $this->db->get('_utility')->result_array() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/utility') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;

            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function edit_uti($id)
        {
            if( $this->session->userdata('key_kalibrasi') != null && $this->session->userdata('key_kalibrasi') == 1 ){
                $data['judul'] = 'Pengaturan Halaman Depan '; 
                $data['header'] = 'Pengaturan'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'admin/lab/utility"> Pengaturan </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah</li>
                '; 

                $this->db->where('id_uti', $id) ;
                $data['row'] = $this->db->get('_utility')->row_array() ;
                
                $this->form_validation->set_rules('judul', 'Judul', 'required');
                $this->form_validation->set_rules('isi', 'Isi', 'required');

                if($this->form_validation->run() == FALSE) {
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/edit_uti') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
                }else{
                    $this->db->where('id_uti', $id) ;
                    $this->db->set(['judul' => $this->input->post('judul'), 'isi' => $this->input->post('isi')]) ;
                    $this->db->update('_utility') ;

                    $this->session->set_flashdata(['pesan'=>'Pengaturan berhasil diubah', 'warna'=>'success']) ;
                    redirect("admin/lab/utility") ;
                }

            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function Pesan()
        {
            if( $this->session->userdata('key_kalibrasi') != null && $this->session->userdata('key_kalibrasi') == 1 ){
                $data['judul'] = 'Pesan '; 
                $data['header'] = 'Pesan Dari User'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.base_url().'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Pesan Dari User</li>
                '; 

                $data['pesan'] = $this->db->get('_pesan')->result_array() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/pesan') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;

            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }
    }

?>