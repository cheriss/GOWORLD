<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $kegiatankode = $_GET["hapus"];
        mysqli_query($connection, "delete from kegiatan
        where kegiatanID = '$kegiatankode'");
        
        echo "<script>
                alert('DATA BERHASIL DIHAPUS');
                document.location = 'kegiatan.php'
              </script>";
    } 
?>