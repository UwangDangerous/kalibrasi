<?php

$mpdf = new \Mpdf\Mpdf(['format' => [210, 297] ]); //215, 330

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Alat</title>
    <link rel="stylesheet" href="'.base_url().'assets/css/cetak.css">
</head>
<body>';

    $id_alat = explode('|',$id_exe) ;
    foreach($id_alat as $id) {
        $data = $this->db
                        ->where('id_alat', $id)
                        ->join('admin', 'admin.id_admin = alat.id_admin')
                        ->join('unit', 'unit.id_unit = admin.id_unit')
                        ->join('lab', 'lab.id_lab = alat.id_lab')
                        ->join('_alat', '_alat.id_ma = alat.id_ma')
                        ->join('_tipe_alat', '_tipe_alat.id_ma = _alat.id_ma', 'left')
                        ->get('alat')
                        ->row_array() ;
$html .= '
            <div id="alat">
                <div id="alat-body">
                    <img src="'.base_url().'assets/img/logo.png" alt="" width="220px"> <br><br>
                    <b>'.$data['nama_unit'].' '.$data['nama_admin'].'</b> 

                    <br>
                    <br>
                    Laboratorium :
                    <br>
                    '.$data['nama_lab'].'
                    <br>
                    <br>
                    No BMN : '.$data['no_bmn'].'
                    <br>
                    '.$data['nama_ma'].' '.$data['nama_ta'].'
                    ';
                if($data['kode_lokal'] != ''){
$html .= '          <br><br>
                    <b id="kode-lokal">'.$data['kode_lokal'].'</b>';
                }
$html .= '          <br>
                    <img src="'.base_url().'assets/qr-code/'.$data['kode_alat'].'.png" alt="" width="150px"> <br>
                    <i>Scan Barcode</i>
                </div>
            </div>
        ' ;
    }

$html .= '
</body>
</html>
' ;
$mpdf->WriteHTML($html);
$mpdf->Output("Kartu Alat ".$this->session->userdata("unit_kalibrasi")." ".$this->session->userdata("nama_kalibrasi")." .pdf","I");

// echo($html) ;
?>