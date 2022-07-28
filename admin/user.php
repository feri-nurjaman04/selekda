<?php 
require '../function.php';

// Hak Akses
$level = $_SESSION['role'];
if($level !== 'admin'){
    header('Location:../login/logout.php');
}else{

}

$data = mysqli_query($conn, "SELECT * FROM user");

if(isset($_POST['submit'])){
    if(regist($_POST)==true){
        header("Location:user.php");
    }else{
        echo "<script>
                alert('Data Gagal Ditambahkan');
                document.location = 'user.php'; 
             </script>
             ";
    }
}

error_reporting(0);
$id = $_GET['iduser'];
if(hapusUser($id)> 0){
    header('location:user.php');
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
        <div class="container" style="width: 100%;">
            <div class="data">
                <article>
                    <h1>Manajemen Anggota</h1>
                </article>
                <table border="1" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Kelahiran</th>
                        <th>Telpon</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach($data as $dt): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><img src="../img/<?= $dt['foto']; ?>"></td>
                                <td><?= $dt['nama']; ?></td>
                                <td><?= $dt['username']; ?></td>
                                <td><?= $dt['email']; ?></td>
                                <td><?= $dt['password']; ?></td>
                                <td><?= $dt['tanggal_lahir']; ?></td>
                                <td><?= $dt['telpon']; ?></td>
                                <td>
                                    <a href="user.php?iduser=<?= $dt['iduser']; ?>" onclick="return confirm('Apakah anda yakin?')">
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
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama">
                    </div>
                    <div class="wrapper">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <div class="wrapper">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="wrapper">
                        <label for="tanggal">Tanggal Lahir</label>
                        <input type="date" name="tanggal" id="tanggal">
                    </div>
                    <div class="wrapper">
                        <label for="telpon">Nomor Telpon</label>
                        <input type="tel" name="telpon" id="telpon">
                    </div>
                    <div class="wrapper">
                        <label for="sandi">Password</label>
                        <input type="password" name="sandi" id="sandi">
                    </div>
                    <div class="wrapper">
                        <label for="role">Hak Akses</label>
                        <select name="role" id="role">
                            <option disabled selected>Pilih Hak Akses</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="wrapper">
                        <label for="profil">Foto Profil</label>
                        <input type="file" name="foto" id="profil">
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