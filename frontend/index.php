<!doctype html>

<?php
include "includes/config.php";

$area = mysqli_query($connection, "select * from area");

$destinasi = mysqli_query($connection, "select * from destinasi");
$jumlahdestinasi = mysqli_num_rows($destinasi);

$foto = mysqli_query($connection, "select * from fotodestinasi");
$kabupaten = mysqli_query($connection, "select * from kabupaten");
$kategori = mysqli_query($connection, "select * from kategori");
$hotel = mysqli_query($connection, "select * from hotel");
$berita = mysqli_query($connection, "select * from berita");
$cenderamata = mysqli_query($connection, "select * from cenderamata, area
    where cenderamata.areaID = area.areaID");
$restoran = mysqli_query($connection, "select * from restoran, area
    where restoran.areaID = area.areaID");
$kegiatan = mysqli_query($connection, "select * from kegiatan, area
    where kegiatan.areaID = area.areaID");
$daftarhotel = mysqli_query($connection, "select * from hotel, area, kabupaten
    where hotel.areaID = area.areaID
    and area.kabupatenKode = kabupaten.kabupatenKode");
$daftarberita = mysqli_query($connection, "select * from berita, destinasi
where berita.beritaID = destinasi.destinasiID");
?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <title>GOWORLD</title>
    <link href="css/index.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!--MENUBAR-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <a class="navbar-brand" href="#">GOWORLD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kabupaten
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if (mysqli_num_rows($kabupaten) > 0) {
                                while ($row = mysqli_fetch_array($kabupaten)) { ?>
                                    <a class="dropdown-item" href="kabupaten.php"><?php echo $row['kabupatenNama']; ?></a>
                            <?php }
                            } ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Destinasi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if (mysqli_num_rows($destinasi) > 0) {
                                while ($row = mysqli_fetch_array($destinasi)) { ?>
                                    <a class="dropdown-item" href="destinasi.php"><?php echo $row['destinasiNama']; ?></a>
                            <?php }
                            } ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Area
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if (mysqli_num_rows($area) > 0) {
                                while ($row = mysqli_fetch_array($area)) { ?>
                                    <a class="dropdown-item" href="#kegiatan"><?php echo $row['areaNama']; ?></a>
                            <?php }
                            } ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Berita
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if (mysqli_num_rows($berita) > 0) {
                                while ($row = mysqli_fetch_array($berita)) { ?>
                                    <a class="dropdown-item" href="#berita"><?php echo $row['beritaJudul']; ?></a>
                            <?php }
                            } ?>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    <!--AKHIR MENU-->

    <!--SLIDER-->
    <div class="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/jakarta.jpg" alt="First slide">

                    <div class="carousel-caption d-none d-md-block">
                        <h1>JAKARTA</h1>
                        <p>Merupakan salah satu kota terbesar di Indonesia<br>
                            dan merupakan Ibu Kota Republik Indonesia</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/surabaya.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Surabaya</h1>
                        <p>Merupakan Ibu Kota Provinsi Jawa Timus, Indonesia<br>
                            dan merupakan kota metropolitan di provinsi tersebut</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/bandung.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>BANDUNG</h1>
                        <p>Merupakan Ibu Kota Provinsi Jawa Barat, Indonesia<br>
                            dan merupakan kota terbesar keempat di Indonesia setelah Jakarta</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!--AKHIR SLIDER-->

    <!--TAMPILAN OBJEK-->
    <div class="objek">
        <div class="container">
            <div class="row ">

                <div class="col-sm-7 kiri mx-auto">
                    <div class="card">
                        <!--kolom kiri = media object-->
                        <div class="jumbotron">
                            <div class="container">
                                <h1 class="display-4">Destinasi Wisata</h1>
                            </div>
                        </div>

                        <?php
                        // membuat pagination
                        $jumlahtampilan = 4; //menampilkan perhalaman 4 baris
                        $halaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
                        $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                        $sql = mysqli_query($connection, "select * from kategori, destinasi, fotodestinasi
                        where kategori.kategoriID = destinasi.kategoriID
                        and destinasi.destinasiID = fotodestinasi.destinasiID
                        limit $mulaitampilan, $jumlahtampilan");

                        if (mysqli_num_rows($sql) > 0) {
                            while ($row2 = mysqli_fetch_array($sql)) { ?>
                                <div class="card-body">
                                    <div class="media">
                                        <div class="row mx-auto">
                                            <div class="col-8">
                                                <div class="media-body">
                                                    <h3 class="mt-0 mb-1"><?php echo $row2['destinasiNama']; ?></h3>
                                                    <div class="alamat">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 
                                                            .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                                                            <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                                                        </svg>
                                                        <h6"><?php echo $row2['destinasiAlamat']; ?></h6>
                                                    </div>
                                                    <p><?php echo $row2['kategoriKeterangan']; ?></p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <img class="ml-3 img-fluid" src="img/<?php echo $row2['fotoFile']; ?>" alt="Gambar Tidak Ada">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php   }
                        }
                        ?>

                        <div class="col-sm-12 tombol">
                            <ul class="pagination">
                                <a href="destinasi.php" class="btn col-sm-12">Lanjut Membaca...</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 kanan">

                    <div class="card">
                        <!--KOLOM KANAN - LIST GROUP-->
                        <ul class="list-group list-group-flush">
                            <div class="jumbotron">
                                <div class="container">
                                    <h1 class="display-6">Toko Cinderamata</h1>
                                </div>
                            </div>


                            <?php
                            while ($row3 = mysqli_fetch_array($cenderamata)) { ?>
                                <li class="list-group-item">
                                    <h5><?php echo $row3['cenderamataNama']; ?></h5>
                                    <p>Area: <?php echo $row3['areaNama']; ?></p>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="tag">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Kategori</h5>
                                <hr>
                                <div class="isi-tag">
                                    <ul>
                                        <?php
                                        while ($rowtag = mysqli_fetch_array($kategori)) { ?>
                                            <li class="btn"><a href="#"><?php echo $rowtag['kategoriNama']; ?></a></li>
                                        <?php   }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--AKHIR OBJEK-->

    <!--GALLERY FOTO-->
    <div class="kegiatan">
        <div class="container" id="kegiatan">

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="judul text-center">
                        <h1>Gallery Kegiatan</h1>
                        <h4 class="caption">Kegiatan yang dilakukan di berbagai area</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                while ($row4 = mysqli_fetch_array($kegiatan)) { ?>
                    <div class="col-lg-4 col-sm-6 mt-30">
                        <figure class="figure">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="img/<?php echo $row4['kegiatanFoto']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row4['kegiatanNama']; ?></h5>
                                    <p class="card-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 
                                                    .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                                            <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                                        </svg>
                                        <?php echo $row4['kegiatanLokasi']; ?> - <?php echo $row4['areaNama'] ?>
                                    </p>
                                </div>
                            </div>
                        </figure>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--AKHIR GALLERY-->

    <!--GALLERY 2-->
    <div class="gallery2" id="berita">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="hotel">

                        <div class="judul-hotel">
                            <h1>Daftar Hotel</h1>
                        </div>

                        <?php
                        // membuat pagination
                        $jumlahtampilan = 4; //menampilkan perhalaman 2 baris
                        $halaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
                        $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                        $daftarhotel = mysqli_query($connection, "select * from hotel, area, kabupaten
                        where hotel.areaID = area.areaID
                        and area.kabupatenKode = kabupaten.kabupatenKode
                        limit $mulaitampilan, $jumlahtampilan");

                        while ($row5 = mysqli_fetch_array($daftarhotel)) { ?>
                            <ul class="list-unstyled">
                                <li class="media">
                                    <div class="row">
                                        <img class="mr-3" src="img/<?php echo $row5['hotelFoto']; ?>" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1"><?php echo $row5['hotelNama']; ?></h5>
                                            <p>
                                                <?php echo $row5['hotelAlamat']; ?><br>
                                                <?php echo $row5['hotelKeterangan']; ?><br></p>
                                            <p><?php echo $row5['areaNama']; ?> - <?php echo $row5['kabupatenNama']; ?></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <?php }
                        ?>

                        <div class="col-sm-12 tombol">
                            <ul class="pagination">
                                <a href="hotel.php" class="btn col-sm-12">Selanjutnya...</a>
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="col-sm-5">
                    <div class="news">
                        <div class="card">
                            <div class="card-body">

                                <div class="judul-berita">
                                    <h1>Berita</h1>
                                </div>

                                <?php

                                // membuat pagination
                                $jumlahtampilan = 2; //menampilkan perhalaman 2 baris
                                $halaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
                                $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                                $daftarberita = mysqli_query($connection, "select * from berita, destinasi, area, kabupaten
                                    where berita.destinasiID = destinasi.destinasiID
                                    and destinasi.areaID = area.areaID
                                    and area.kabupatenKode = kabupaten.kabupatenKode
                                    limit $mulaitampilan, $jumlahtampilan");

                                while ($row6 = mysqli_fetch_array($daftarberita)) { ?>
                                    <h5 class="card-title"><?php echo $row6['beritaJudul']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row6['tanggalTerbit']; ?>
                                        <div class="penulis">
                                            Penulis: <?php echo $row6['penulis']; ?>
                                        </div>
                                    </h6>
                                    <br>
                                    <div class="nama-destinasi">
                                        <h6 class="card-subtitle" style="font-size: 19px;"><?php echo $row6['destinasiNama']; ?></h6>
                                        <div class="lokasi" style="font-size: 19px;">
                                            <h6 class="mb-2 text-muted"><?php echo $row6['kabupatenNama']; ?> -
                                                <?php echo $row6['kabupatenAlamat']; ?>
                                            </h6>
                                        </div>
                                        <p class="card-text"><?php echo $row6['beritaInti']; ?></p>
                                    </div>
                                    <hr>
                                <?php }
                                ?>

                                <!--UNTUK NAMBAH PERPAGE-->
                                <?php
                                $query = mysqli_query($connection, "select * from berita");
                                $jumlahrecord = mysqli_num_rows($query);
                                $jumlahpage = ceil($jumlahrecord / $jumlahtampilan);
                                ?>

                                <!--PAGINATION-->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php $hal = 1;
                                                                                echo $hal ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>

                                        <?php
                                        for ($hal = 1; $hal <= $jumlahpage; $hal++) { ?>
                                            <li class="page-item">
                                                <?php
                                                if ($hal != $halaman) { ?>
                                                    <a class="page-link" href="?page=<?php echo $hal ?>">
                                                        <?php echo $hal ?></a>
                                                <?php } else { ?>
                                                    <a class="page-link" href="?page=<?php echo $hal ?>">
                                                        <?php echo $hal ?></a>
                                                <?php } ?>
                                            </li>
                                        <?php }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $hal - 1 ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!--AKHIR PAGINATION-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--akhir gallery 2-->

    <!--CONTACT-->
    <div class="contact-area">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-lg-6">
                    <div class="judul text-center mt-80">
                        <h1>Contact Us</h1>
                        <h6>Let's get in touch with us by fill out
                            the form with your inquiry.</h6>
                    </div>
                </div>

                <div class="col-sm-6">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFname">First Name</label>
                                <input type="text" class="form-control" id="inputFname" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLname">Last Name</label>
                                <input type="text" class="form-control" id="inputLname" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="Email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="inputMessage">Message</label>
                            <textarea class="form-control" id="inputMessage" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--AKHIR CONTACT-->

    <!--FOOTER-->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="widget-title">
                        <h2>Worldy</h2>
                    </div>

                    <div class="isi-teks">
                        <p>
                            5th flora, 700/D kings road, green<br>
                            lane New York-1782<br>
                            <a href="#">+62 367 826 2567</a><br>
                            <a href="#">contact@carpenter.com</a><br>
                        </p>
                    </div>

                </div>

                <div class="col-sm-4">
                    <div class="widget-title">
                        <h2>Informasi Restoran</h2>
                    </div>

                    <?php
                    while ($row8 = mysqli_fetch_array($restoran)) { ?>
                        <ul id="menu-footer-1" class="list-group">
                            <a href="#">
                                <li class="list-item"><?php echo $row8['restoranNama']; ?> -
                                    <?php echo $row8['areaNama']; ?>
                                </li>
                            </a>
                        </ul>
                    <?php } ?>
                </div>

                <div class="col-sm-4">
                    <div class="widget-title">
                        <h2>Contact Us</h2>
                    </div>
                    <p style="font-size: 17px; color: #F8FFDB;">admin@worldy.com</p>

                </div>

                <div class="col-sm-4">
                    <div class="widget-title">
                        <h2>Social Media</h2>
                    </div>
                    <div class="menu-sosmed">
                        <a class="fa fa-facebook" href="#"></a>
                        <a class="fa fa-twitter" href="#"></a>
                        <a class="fa fa-instagram" href="#"></a>
                        <a class="fa fa-pinterest" href="#"></a>
                        <a class="fa fa-youtube-play" href="#"></a>
                    </div>

                </div>
            </div>

            <div class="footer-bawah">
                <div class="container">
                    <div class="copyright">
                        <p>copyright &copy;2022 All rights reserved | This web is made for you with ♥</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>