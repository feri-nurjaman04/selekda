<?php 
// Menghubungkan Dengan function.php
require '../function.php';

error_reporting(0);
$username = $_POST['username'];
$password = $_POST['password'];

// Logic fitur login(Mencari akun terkait di database
if(isset($_POST['masuk'])){
    $cekAkun = query("SELECT * FROM user WHERE username = '$username' AND password = '$password'")[0];

    if($cekAkun == true){
        $_SESSION['log'] = 'True';
        $_SESSION['role'] = $cekAkun['role'];
        header('Location:../index.php');
    }else{
        header('Location:login.php');
    }
}

// Logic tombol login
if(!isset($_SESSION['log'])){
    
}else{
    header('Location:../index.php');
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
    <div class="container">
        <div class="card">
            <div class="head">
                <h2>Selekda Esport Indonesia</h2>
            </div>
            <div class="body">
                <form method="post">
                    <div class="wrap">
                        <label for="username">Username</label>
                        <input autocomplete="off" required type="text" name="username" id="username">
                    </div>

                    <div class="wrap">
                        <label for="password">Password</label>
                        <input type="password" name="password" autocomplete="off" required id="password">
                    </div>

                    <div class="wrap">
                        <button name="masuk">Masuk!</button>
                        <span>Belum punya akun? Daftar <a href="regist.php">Disini!</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>