<?php
if( !function_exists('deskripsi_kd') ) {
    function deskripsi_kd($nilai){
        if($nilai>=86){
            return "A";
        }else if($nilai>=71){
            return "B";
        }else if($nilai>=60){
            return "C";
        }else if($nilai>=40){
            return "D";
        }else{
        	return "E";
        }
    }
}

?>