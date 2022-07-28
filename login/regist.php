<?php 
// Menghubungkan Dengan function.php
require '../function.php';

error_reporting(0);
$acc = $_POST['telpon'];
$cek = query("SELECT * FROM user WHERE telpon = '$acc'");

if(isset($_POST['regist'])){
    if($cek == true){
        echo "
            <script>
                alert('Akun Sudah Ada!');
                document.location = 'regist.php';
            </script>
             ";
    }else{
        regist($_POST)==true;
        header('Location:login.php');
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../aset/css/login.css">
    <title>Selekda Esport Indonesia</title>
</head>
<body>
    <div class="regist">
        <div class="card">
            <div class="head">
                <h2>Selekda Esport Indonesia</h2>
            </div>
            <div class="body">
                <form method="post">
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
                        <label for="profil">Foto Profil</label>
                        <input type="file" name="profil" id="profil">
                    </div>
                    <div class="wrapper">
                        <label for="telpon">Nomor Telpon</label>
                        <input type="tel" name="telpon" id="telpon">
                    </div>
                    <div class="wrapper">
                        <label for="sandi">Password</label>
                        <input type="text" name="sandi" id="sandi">
                    </div>
                    <div class="wrapper">
                        <button name="regist">Daftar Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>