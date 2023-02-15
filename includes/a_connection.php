<?php
function OpenCon()
 {
    $db = new mysqli("localhost", "root", "", "store");
 
 return $db;
 }
 
function CloseCon($db)
 {
 $db -> close();
 }
   
?>