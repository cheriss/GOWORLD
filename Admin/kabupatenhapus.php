<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $kabupatenkode = $_GET["hapus"];
        mysqli_query($connection, "delete from kabupaten
        where kabupatenKode = '$kabupatenkode'");
        
        echo "<script>
                alert('DATA BERHASIL DIHAPUS');
                document.location = 'kabupaten.php'
              </script>";
    } 
?>