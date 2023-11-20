<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" type="text/css">

</head>

<?php 
   
   ob_start();
   session_start();
   if(!isset($_SESSION['emailuser']))
   {
       header("location: login.php");
   }
   
   include "header.php";?>
   
   <!--ADA DARI TABLES.HTML-->
   <div class="container-fluid"> 
   <div class="card shadow mb-4">

<?php
    include "includes/config.php";

    //kalo batal
    if(isset($_POST['batal']))
    {
        header("location: fotoDestinasi.php");
    }
    
    /*pengiriman setelah tombol submit diklik. isi dalam kurung siku hrs sesuai sama name di tombol submit*/
    if(isset($_POST['ubah']))
    {  
        if(isset($_REQUEST['inputkode']))
        {
            $kodefoto = $_REQUEST['inputkode'];
        }

        if(!empty($kodefoto))
        {
            $kodefoto = $_REQUEST['inputkode'];
        }
        else
        {
            ?> <h1>Anda harus mengisi data</h1> <?php
            die("Data harus terisi");
        }

        $namafoto = $_POST['inputnama'];
        $kodedestinasi = $_POST['kodedestinasi'];

        $nama = $_FILES['file']['name'];
        $file_tmp = $_FILES["file"]["tmp_name"];

        //kalo gambar ga dipilih/diupload
        if(empty($nama))
        {
            mysqli_query($connection, "update fotodestinasi set 
            fotoNama = '$namafoto', destinasiID = '$kodedestinasi'
            where fotoID = '$kodefoto'");

            /*buat manggil formnya lagi = header(namaFile)*/
            header("location:fotoDestinasi.php");
        }
        else //kalo gambarnya dirubah

        //menampung ekstensi file
        $ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);

        //periksa ekstensi file harus JPG atau jpg atau png
        if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "PNG") or ($ekstensifile == "png"))
        {
            //maka upload
            move_uploaded_file($file_tmp, 'img/'.$nama);
            //unggah file ke folder
            mysqli_query($connection, "update fotodestinasi set
            fotoNama='$namafoto', destinasiID='$kodedestinasi', fotoFile='$nama'
            where fotoID = '$kodefoto'");
        } 

        /*buat manggil formnya lagi = header(namaFile)*/
        header("location:fotoDestinasi.php");
    }

    $dataDestinasi = mysqli_query($connection, "select * from destinasi");

    //MENAMPILKANN DATA PADA FORM
    $kodefoto = $_GET["ubah"];
    //memanggil file fotodestinasi
    $editfoto = mysqli_query($connection, "select * from fotodestinasi 
    where fotoID = '$kodefoto'");
    $rowedit = mysqli_fetch_array($editfoto);

    //MEMUNCULKAN NAMA DESTINASI DI SEARCH
    $editdestinasi = mysqli_query($connection, "select * from destinasi, fotodestinasi
    where fotoID = '$kodefoto' and destinasi.destinasiID = fotodestinasi.destinasiID");
    $rowedit2 = mysqli_fetch_array($editdestinasi);
?>

<body>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid" style="margin-top: 15px;">
                <div class="container">
                    <h1 class="display-4">Edit Foto Destinasi Wisata</h1>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="kodefoto" class="col-sm-2 col-form-label">Kode Photo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kodefoto"
                        name="inputkode" value="<?php echo $rowedit["fotoID"]?>" readonly>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="namafoto" class="col-sm-2 col-form-label">Nama Photo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namafoto"
                        name="inputnama" value="<?php echo $rowedit["fotoNama"]?>">
                    </div>
                </div>  

                <div class="form-group row">
                    <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kodedestinasi" id="namadestinasi">
                            <option value="<?php echo $rowedit["destinasiID"]?>">
                                <?php echo $rowedit["destinasiID"]?>
                                <?php echo $rowedit2["destinasiNama"]?>
                            </option>
                            <?php while($row = mysqli_fetch_array($dataDestinasi))
                            {?>
                                <option value="<?php echo $row["destinasiID"]?>">
                                    <?php echo $row["destinasiID"]?>
                                    <?php echo $row["destinasiNama"]?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>
                </div>  

                <div class="form-group row">
                    <label for="file" class="col-sm-2 col-form-label">Foto Wisata</label>
                    <div class="col-sm-10">
                        <input type="file" id="file" name="file">
                        <img src="img/<?php echo $rowedit['fotoFile']?>" style="width: 200px;
                        height: 100px;">
                        <p class="help-block">Field ini digunakan untuk unggah file</p>
                    </div>
                </div>

                <!--BUTTON = dari bootstrap-->
                <div class="form-group row mb-5">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" style="background: #3A8891; border: 1px solid #3A8891;" name="ubah">Ubah</button>
                    <button type="submit" class="btn btn-secondary" name="batal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-1"></div>
    </div> <!--penutup input-->

    <!--OUTPUTNYA-->
    <div class="row"> 
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Daftar Foto Destinasi Wisata</h1>
                    <h2>Hasil Entri Data pada Tabel Foto Destinasi</h2>
                </div>
            </div> <!--penutup jumbotron-->

            <!--untuk mencari data pda tabel. POSt = untuk mengirim-->
            <form method="POST">
                <div class="from-group row mb-2">
                <label for="search" class="col-sm-3">Nama Foto Destinasi</label>
                    <div class="col-sm-6">
                    <!--supaya gailang tulisannya pas di search-->
                        <input type="text" class="form-control" name="search" id="search" 
                        placeholder="Cari Nama Foto Destinasi" value="<?php 
                        if(isset($_POST['search'])) {echo $_POST['search'];}?>">
                    </div>
                    <input type="submit" name="kirim" class="col-sm-1 btn btn-danger" value="Search">
                </div>
            </form>

            <table class="table table-hover table" style="background: #EFF5F5;">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Foto</th>
                        <th>Nama Foto Wisata</th>
                        <th>Kode Destinasi</th>
                        <th>Foto Destinasi</th>

                        <th colspan="2" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!--pemanggilan tabel dari database-->
                    <?php
                        if(isset($_POST['kirim']))
                        {
                            $search = $_POST['search'];
                            $query = mysqli_query($connection, "select * from fotodestinasi, destinasi
                            where fotoNama like '%$search%'
                            and fotodestinasi.destinasiID = destinasi.destinasiID
                            order by fotoID");
                            //'%".$search."%' atau '%$search%'= mencari dari kata yang terkandung
                            //'%$search' = mencari dari kata paling blakang
                            //'$search%' = mencari dari kata paling depan
                        }
                        else
                        {
                            $query = mysqli_query($connection, "select * from fotodestinasi, destinasi
                            where fotodestinasi.destinasiID = destinasi.destinasiID
                            order by fotoID");
                        }
                        $nomor = 1; //menampilkan nomor dari no. 1
                        while($row = mysqli_fetch_array($query))
                        {?>
                            <tr>
                                <td><?php echo $nomor;?></td>
                                <td><?php echo $row['fotoID'];?></td>
                                <td><?php echo $row['fotoNama'];?></td>
                                <td><?php echo $row['destinasiID'];?></td>
                                <td>
                                    <?php if(is_file("img/".$row['fotoFile']))
                                    {?>
                                        <img src="img/<?php echo $row['fotoFile']?>" width="80">
                                    <?php } else
                                        echo "<img src='img/noimage.png' width='80'>"
                                    ?>
                                </td>

                                <!--ICON EDIT-->
                                <td>
                                    <!--php?ubah. ubah = variabel penampungnya-->
                                    <a href="fotodestinasiedit.php?ubah=<?php echo $row["fotoID"]?>" class="btn btn-success btn-sm"
                                    title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>
                                </td>
                                
                                <!--ICON DELETE-->
                                <td>
                                    <a href="fotodestinasihapus.php?hapus=<?php echo $row["fotoID"]?>" class="btn btn-danger btn-sm"
                                    title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        $nomor = $nomor + 1;}
                    ?>

                </tbody>
            </table>
        </div>
</body>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!--script untuk select2-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<?php include "footer.php";?>
<?php
    mysqli_close($connection);
    ob_end_flush();
?>

</html>