<?php 

    class Cetak extends CI_Controller{
        public function kartuAlat() 
        {
            $alat = $this->db
                ->select('id_alat')
                ->get('alat')
                ->result_array() ;

            $query = '' ;
            foreach($alat as $a) {
                $a = $a['id_alat'] ;
                if($a == $this->input->post("alat_$a") ) {

                    $query .= $this->input->post("alat_$a").'|' ;

                }
            }

            $data['id_exe'] = rtrim($query, '|') ;
            $this->load->view('cetak/kartuAlat', $data) ;
        }
    }

?>