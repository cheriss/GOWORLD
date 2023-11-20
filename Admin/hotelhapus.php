<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $hotelkode = $_GET["hapus"];
        mysqli_query($connection, "delete from hotel
        where hotelID = '$hotelkode'");
        
        echo "<script>
                alert('DATA BERHASIL DIHAPUS');
                document.location = 'hotel.php'
              </script>";
    } 
?>