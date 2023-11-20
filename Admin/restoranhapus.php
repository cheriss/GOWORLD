<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $restorankode = $_GET["hapus"];
        mysqli_query($connection, "delete from restoran
        where restoranID = '$restorankode'");
        
        echo "<script>
                alert('DATA BERHASIL DIHAPUS');
                document.location = 'restoran.php'
              </script>";
    } 
?>