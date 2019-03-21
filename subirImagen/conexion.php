<?php
 function conectarBd(){
     $conex = mysql_connect("localhost","avesousa","26390042");
     if(!$conex){
        die("ERROR: " .mysql_error());
     }

     $basededato = mysql_select_db("dgrec",$conex);
     if(!$basededato){
        die("ERROR: " .mysql_error());
     }
 }
?>