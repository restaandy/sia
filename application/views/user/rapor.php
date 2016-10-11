<?php
$pdf=new PDF_MC_Table();
$pdf->AddPage("P");
$pdf->SetFont('Times','',12);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(10,40,20,40,30,40));
$pdf->Row(array("N0","Nama Mapel","Nilai Teori","Deskripsi Teori","Nilai Praktek","Deskripsi Praktek"));
$x=1;
    foreach ($rapot as $key) {   
         $pdf->Row(array($x,$key->nama_mapel,$key->nilai_teori,$key->skt,$key->nilai_praktek,$key->skp));
     $x++;   
    }
$pdf->Output();

?>