<?php 

    class QRCode_model extends CI_Model{
        public function setQR($kode){

            $url = base_url().'riwayat/penggunaan/' ;

            $data = isset($_GET['data']) ? $_GET['data'] : $kode;
            $size = isset($_GET['size']) ? $_GET['size'] : '200x200';
            $logo = isset($_GET['logo']) ? $_GET['logo'] : base_url().'assets/img/logo-bpom.png';

            header('Content-type: image/png');
            // Get QR Code image from Google Chart API
            // http://code.google.com/apis/chart/infographics/docs/qr_codes.html
            $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
            if($logo !== FALSE){
                $logo = imagecreatefromstring(file_get_contents($logo));

                $QR_width = imagesx($QR);
                $QR_height = imagesy($QR);
                
                $logo_width = imagesx($logo);
                $logo_height = imagesy($logo);
                
                // Scale logo to fit in the QR Code
                $logo_qr_width = $QR_width/3;
                $scale = $logo_width/$logo_qr_width;
                $logo_qr_height = $logo_height/$scale;
                
                imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
            }
            imagepng($QR, './assets/qr_code/'.$kode.'.png');
            imagedestroy($QR);
        }
    }

?>