<?php 
require '../function.php';

// Hak Akses
$level = $_SESSION['role'];
if($level !== 'admin'){
    header('Location:../login/logout.php');
}else{

}

$data = mysqli_query($conn, "SELECT m.idmember, m.idsquad, m.nama, m.role, m.email, m.kelahiran, m.profil, s.idsquad, s.nama_squad FROM member m INNER JOIN squad s ON m.idsquad = s.idsquad");

if(isset($_POST['submit'])){
    if(member($_POST)==true){
        header("Location:member.php");
    }else{
        echo "<script>
                alert('Data Gagal Ditambahkan');
                document.location = 'member.php'; 
             </script>
             ";
    }
}
error_reporting(0);
$id = $_GET['idmember'];
if(hapusMember($id)> 0){
    header('location:member.php');
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
                        <th>Squad</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Kelahiran</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach($data as $dt): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><img src="../img/<?= $dt['profil']; ?>"></td>
                                <td><?= $dt['nama_squad']; ?></td>
                                <td><?= $dt['nama']; ?></td>
                                <td><?= $dt['role']; ?></td>
                                <td><?= $dt['email']; ?></td>
                                <td><?= $dt['kelahiran']; ?></td>
                                <td>
                                    <a href="member.php?idmember=<?= $dt['idmember']; ?>" onclick="return confirm('Apakah anda yakin?')">
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
                    <div class="warpper">
                        <?php $squad = query("SELECT * FROM squad"); ?>
                        <label for="squad">Nama Squad</label>
                        <select class="form-control" class="js-example-basic-single" name="squad" id="squad">
                            <option disabled selected> Pilih Squad</option>
                            <?php $sel = mysqli_query($conn, "SELECT * FROM squad"); ?>
                            <?php while($option = mysqli_fetch_assoc($sel)): ?>
                                <option value="<?= $option['idsquad']; ?>"><?= $option['nama_squad']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="wrapper">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama">
                    </div>

                    <div class="wrapper">
                        <label for="role">Role</label>
                        <select name="role" id="role">
                            <option disabled selected>Pilih Role</option>
                            <option value="Ketua">Ketua</option>
                            <option value="anggota">Anggota</option>
                        </select>
                    </div>

                    <div class="wrapper">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email">
                    </div>

                    <div class="wrapper">
                        <label for="date">Tanggal Lahir</label>
                        <input type="date" name="date" id="date">
                    </div>

                    <div class="wrapper">
                        <label for="Foto">Foto</label>
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