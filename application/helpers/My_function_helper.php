<?php
if( !function_exists('deskripsi_kd') ) {
    function deskripsi_kd($nilai){
        if($nilai>=86){
            return "Sangat Menonjol";
        }else if($nilai>=71){
            return "Menonjol";
        }else{
            return "Perlu Meningkatkan";
        }
    }
}

?>