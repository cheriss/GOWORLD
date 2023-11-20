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
    <link href="css/kabupaten.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!--MENUBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
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
                                <a class="dropdown-item" href="index.php #kegiatan"><?php echo $row['areaNama']; ?></a>
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
                                <a class="dropdown-item" href="index.php #berita"><?php echo $row['beritaJudul']; ?></a>
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

    <!--KABUPATEN-->
    <div class="kabupaten">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="judul text-center">
                        <h1>KABUPATEN</h1>
                        <h4 class="caption">Kabupaten destinasi yang ada di Indonesia</h4>
                    </div>
                </div>

                <?php

                // membuat pagination
                $jumlahtampilan = 6; //menampilkan perhalaman 2 baris
                $halaman = (isset($_GET['page'])) ? $_GET['page'] : 1;
                $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                $daftarkabupaten = mysqli_query($connection, "select * from kabupaten
                    limit $mulaitampilan, $jumlahtampilan");

                while ($row = mysqli_fetch_array($daftarkabupaten)) { ?>
                    <div class="col-lg-4 col-sm-6 mt-30">
                        <figure class="figure">
                            <img src="img/<?php echo $row['kabupatenFotoicon'];?>" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption"><?php echo $row['kabupatenNama'];?></figcaption>
                        </figure>
                    </div>
                <?php } ?>
            </div>
            <!--UNTUK NAMBAH PERPAGE-->
            <?php
            $query = mysqli_query($connection, "select * from destinasi");
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
            <!--AKHIR KABUPATEN-->
        </div>
    </div>
    <!--AKHIR HOTEL-->

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