<?php
    include "includes/config.php";

    if(isset($_GET['hapus']))
    {
        $fotokode = $_GET["hapus"];
        /*hapus file di folder img juga
        $hapusfoto = mysqli_query($connection, "select * from fotodestinasi
        where fotoID = '$fotokode'"); 
        $hapus = mysqli_fetch_array($hapusfoto);
        $namafile = $hapus['fotoFile'];*/

        mysqli_query($connection, "delete from fotodestinasi
        where fotoID = '$fotokode'");

        /*supaya di file keapus juga
        unlink('img/'.$namafile);*/
        
        echo "<script>
                alert('DATA BERHASIL DIHAPUS');
                document.location = 'fotodestinasi.php'
              </script>";
    } 
?>