<?php
 $conn=mysqli_connect("localhost","root","root","crud");

 if(mysqli_connect_errno()){
    die("Unable to  connect to dataBase".mysqli_connect_errno());
 }

 define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/crud/load/");

 define("FETCH_SRC","http://127.0.0.1/crud/load/")

?>