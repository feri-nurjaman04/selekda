<?php 
require '../function.php';

// Hak Akses
$level = $_SESSION['role'];
if($level !== 'admin'){
    header('Location:../login/logout.php');
}else{

}

$data = query("SELECT * FROM galeri");

if(isset($_POST['submit'])){
    if(galeri($_POST)==true){
        header("Location:galeri.php");
    }else{
        echo "<script>
                alert('Data Gagal Ditambahkan');
                document.location = 'galeri.php'; 
             </script>
             ";
    }
}

error_reporting(0);
$id = $_GET['idgaleri'];
if(hapusSquad($id)> 0){
    header('location:galeri.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Selekda Esport Indonesia</title>
</head>
<body>
    <!-- Header -->
    <header>
        <!--Site Brand -->
        <div class="brand">
            <img src="../img/logo.png" alt="logo.png">
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
                <li class="logo-nav"><img src="../img/logo.png"></li>
                <li><a href="squad.php">Squad</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="member.php">Member</a></li>
                <li><a href="user.php">User</a></li>
            </ul>
        </nav>

    </header>

    <main>
        <div class="container">
            <div class="data">
                <article>
                    <h1>Manajemen Galeri</h1>
                </article>
                <table border="1" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach($data as $dt): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><img src="../img/<?= $dt['image']; ?>"></td>
                                <td>
                                    <a href="galeri.php?idgaleri=<?= $dt['idgaleri']; ?>" onclick="return confirm('Apakah anda yakin?')">
                                        <button>
                                            Hapus
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </table>
            </div>

            <div class="formulir">
                <article>
                    <h1>Formulir Tambah Data</h1>
                </article>
                <form method="post" enctype="multipart/form-data">

                    <div class="wrapper">
                        <label for="foto">foto</label>
                        <input type="file" name="foto" id="foto">
                    </div>

                    <div class="wrapper">
                        <button name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<script src="../aset/js/script.js"></script>
</html>