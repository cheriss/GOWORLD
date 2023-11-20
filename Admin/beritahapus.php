<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $beritakode = $_GET["hapus"];
        mysqli_query($connection, "delete from berita
        where beritaID = '$beritakode'");
        
        echo "<script>
                alert('DATA BERHASIL DIHAPUS');
                document.location = 'berita.php'
              </script>";
    } 
?>