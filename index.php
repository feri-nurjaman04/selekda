<?php 
require 'function.php';
require 'login/cek.php';

$level = $_SESSION['role'];

$data = query("SELECT * FROM galeri");
$team = query("SELECT * FROM squad");

?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aset/css/style.css">
    <title>Selekda Esport Indonesia</title>
</head>
<body>
    <!-- Header -->
    <header>
        <!--Site Brand -->
        <div class="brand">
            <img src="img/logo.png" alt="logo.png">
        </div>
        
        <!-- Navigation -->
        <nav>
            <!-- Burger -->
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>

            <!-- Menu -->
            <ul class="menu">
                <li class="logo-nav"><img src="img/logo.png"></li>
                <li><a href="#">Home</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#prestasi">Achievment</a></li>
                <li><a href="login/logout.php">Logout</a></li>
                <?php if($level == 'admin'): ?>
                    <li><a href="admin/squad.php">Setting</a></li>
                <?php else:  ?>
                <?php endif; ?>
            </ul>
        </nav>

    </header>
    <!-- End Header -->

    <!-- Main -->
    <main>
        <!-- Hero Section -->
        <div class="hero">
            <div class="bg"></div>
            <article>
                <h1>SELEKDA ESPORT INDONESIA</h1>
            </article>
        </div>
        <!-- End Hero Section -->

        <!-- about section -->
        <div class="about" id="about">
            <div class="gambar">
                <img src="img/about.png" alt="about.png">
            </div>
            <article class="text">
                <h1>Tentang Kami</h1>
                <p>Kami adalah manajemen E-Sport terbesar Di Indonesia. Berdiri sejak 2017, kami telah menorehkan berbagai prestasi di kancah internasional dan mengharumkan nama Indonesia Raya!</p>
                <div class="sosmed">
                    <div class="box">
                        <img src="img/fb.png">
                    </div>
                    <div class="box">
                        <img src="img/ig.png">
                    </div>
                    <div class="box">
                        <img src="img/tw.png">
                    </div>
                </div>
            </article>
        </div>
        <!-- End About Section -->

        <!-- Team Section -->
        <div class="team">
            <article>
                <h1>Our Warrior</h1>
            </article>
            <div class="container">
                <?php foreach($team as $tm): ?>
                    <div class="box">
                        <img src="img/<?= $tm['foto']; ?>">
                        
                        <article>
                            <h3><?= $tm['nama_squad']; ?></h3>
                            <p><?= $tm['divisi']; ?></p>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- End Team Section -->

        <!-- Prestasi Section -->
        <div class="prestasi" id="prestasi">
            <article>
                <h1>Prestasi</h1>
                <p>5 Tahun lamanya berdiri, tentu saja kami telah menorehkan berbagai prestasi!</p>
            </article>
            <div class="container">
                <div class="slide">
                  <img src="img/slider (1).jpeg">
                </div>
            
                <div class="slide">
                  <img src="img/slider (2).jpg">
                </div>
            
                <div class="slide">
                  <img src="img/slider (3).jpg">
                </div>

                <div class="slide">
                  <img src="img/slider (4).jpeg">
                </div>
            
                <a class="back" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
        <!-- End Prestasi Section -->

        <!-- Gallery Section -->
        <div class="galeri">
            <article>
                <h1>Box Of Memory</h1>
            </article>
            <div class="container">
                <?php foreach($data as $dt): ?>
                <div class="wrapper">
                    <span>
                        <img src="img/<?= $dt['image']; ?>">
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- End Gallery Section -->
    </main>
    <!-- End Main -->
<footer>
    <div class="logo">
        <div>
            <img src="img/logo.png" alt="">
        </div>
        <div>
            <img src="img/assets (2).png">
        </div>
    </div>
    <div class="credit">
        <p>&copy;Develop with &#128151; by <strong>Feri Nurjaman</strong></p>
    </div>
</footer>
    <script src="aset/js/script.js"></script>
</body>
</html>