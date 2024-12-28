<?php
   $servername='localhost';
   $username='root';
   $password='';
   $dbname = "db_reservation";
   $conn=mysqli_connect($servername,$username,$password,"$dbname");
   if(!$conn){
      die('Could not Connect My Sql:' .mysql_error());
   }
?>