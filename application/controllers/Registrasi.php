<?php 

    class Registrasi extends CI_Controller{
        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('Registrasi_model') ;
        } 

        public function index()
        {
            $data['judul'] = 'Registrasi Akun Kalibrasi - PPPOMN '; 
            $data['brand'] =  $this->db->get_where('_utility',['penggunaan' => 'brand'])->row_array()['judul'];
            $data['jumbotron'] =  $this->db->get_where('_utility',['penggunaan' => 'jumbotron'])->row_array();
            

            $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai / Kependudukan', 'required|is_unique[pelaksana.nip]');
            $this->form_validation->set_rules('nama_pelaksana', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pelaksana.email]');
            $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|numeric');
            $this->form_validation->set_rules('satker', 'Satuan Kerja', 'required');
            $this->form_validation->set_rules('bagian', 'Bagian', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password1', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password2', ' ', 'required|min_length[6]|matches[password1]');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('temp/landing/header', $data) ;
                $this->load->view('registrasi/index') ;
                $this->load->view('temp/landing/footer') ;
            }else{
                $this->Registrasi_model->addRegist() ;
            }
        }

        public function login()
        {
            $name = $this->input->post('username') ;
            $pass = md5(sha1($this->input->post('password'))) ;
            $this->db->where('email', $name) ;
            $this->db->or_where('nip', $name) ;
            $this->db->or_where('username', $name) ;
            $data = $this->db->get('pelaksana')->row_array() ;
            if($data) {

                if($data['password'] == $pass) {
                    $pesan = [
                        'pesan_login' => 'Login Berhasil',
                        'warna_login' => 'success'
                    ];

                    $userdata = [
                        'key_pelaksana' => $data['id_pelaksana'] ,
                        'pelaksana' => $data['nama_pelaksana'] 
                    ];

                    $this->session->set_userdata($userdata) ;

                }else{
                    $pesan = [
                        'pesan_login' => 'Password Salah <a href="#" data-toggle="modal" data-target="#login-pelaksana">Login</a>',
                        'warna_login' => 'danger'
                    ];
                }

            }else{
                $pesan = [
                    'pesan_login' => 'Gagal Login, Akun Anda Belum Terdaftar, <a href="'.base_url().'registrasi#regist">Silahkan Daftar Terlebih Dahulu</a>',
                    'warna_login' => 'danger'
                ];
            }
            $this->session->set_flashdata($pesan) ;
            redirect("") ;
        }

        public function logout()
        {
            $this->session->sess_destroy() ;
            redirect("") ;
        }
    }

?>