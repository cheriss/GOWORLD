<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $areakode = $_GET["hapus"];
        mysqli_query($connection, "delete from area
        where areaID = '$areakode'");
        
        echo "<script>
                alert('DATA BERHASIL DIHAPUS');
                document.location = 'area.php'
              </script>";
    } 
?>