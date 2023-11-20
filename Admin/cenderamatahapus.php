<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $cenderamatakode = $_GET["hapus"];
        mysqli_query($connection, "delete from cenderamata
        where cenderamataID = '$cenderamatakode'");
        
        echo "<script>
                alert('DATA BERHASIL DIHAPUS');
                document.location = 'cenderamata.php'
              </script>";
    } 
?>