<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $kategorikode = $_GET["hapus"];
        mysqli_query($connection, "delete from kategori
        where kategoriID = '$kategorikode'");
        
        echo "<script>
                alert('DATA BERHASIL DIHAPUS');
                document.location = 'kategori.php'
              </script>";
    } 
?>