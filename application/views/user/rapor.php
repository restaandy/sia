<?php
$pdf=new PDF_MC_Table();
$pdf->AddPage("L");
$pdf->SetFont('Times','',12);
$pdf->Cell(30,5,'Nama Sekolah',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'L');
$pdf->Cell(115,5,$sekolah->nama_sekolah,0,0,'L');
$pdf->Cell(30,5,'Kelas',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'L');
$pdf->Cell(115,5,$kelas->nama_kelas,0,0,'L');
$pdf->Ln(9);
$pdf->Cell(30,5,'Alamat',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'L');
$pdf->Cell(115,5,$siswa->almt_tambahan,0,0,'L');
$pdf->Cell(30,5,'Semester',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'L');
$pdf->Cell(115,5,$semester,0,0,'L');
$pdf->Ln(9);
$pdf->Cell(30,5,'Nama Siswa',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'L');
$pdf->Cell(115,5,$siswa->nama,0,0,'L');
$pdf->Cell(30,5,'Tahun Pelajaran',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'L');
$pdf->Cell(115,5,$ta,0,0,'L');
$pdf->Ln(9);
$pdf->Cell(30,5,'NISN',0,0,'L');
$pdf->Cell(5,5,' : ',0,0,'L');
$pdf->Cell(115,5,$noinduk,0,0,'L');
$pdf->Ln(20);
$pdf->SetFont('Times','B',14);
$pdf->Cell(30,5,'CAPAIAN HASIL BELAJAR',0,0,'L');
$pdf->Ln(9);
$pdf->SetFont('Times','B',12);
$pdf->Cell(30,5,'A. SIKAP',0,0,'L');
$pdf->Ln(9);
$pdf->SetFont('Times','',12);
$pdf->MultiCell(275,10,$sikap,1,"L");
$pdf->AddPage("L");
$pdf->SetFont('Times','B',12);
$pdf->Cell(30,5,'B. Pengetahuan dan Keterampilan',0,0,'L');
$pdf->Ln(9);
$pdf->SetFont('Times','',12);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(10,50,10,20,20,50,10,20,20,50));
$pdf->Row(array("N0","Nama Mapel","KB","Nilai Teori","Predikat","Deskripsi Teori","KB","Nilai Praktek","Predikat","Deskripsi Praktek"));
$x=1;
    foreach ($rapot as $key) {   
         $pdf->Row(array($x,$key->nama_mapel,$key->kb,$key->nilai_teori,deskripsi_kd($key->nilai_teori),$key->skt,$key->kb_p,$key->nilai_praktek,deskripsi_kd($key->nilai_praktek),$key->skp));
     $x++;   
    }
$pdf->Output();

?>