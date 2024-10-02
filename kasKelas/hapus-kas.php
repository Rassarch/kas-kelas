<?php 
     if(isset($_GET['hapus']))
     {
         $kas_id= $_GET['hapus'];
         // SQL query to delete data from user table where id = $kas_id
         $query = "DELETE FROM kas WHERE id = {$kas_id}"; 
         $hapus= mysqli_query($koneksi, $query);
         header('location:daftar-kas.php');
     }