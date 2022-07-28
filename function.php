<?php 
// request ke server
session_start();

// koneksi database
$conn = mysqli_connect("localhost","root","","selekda");

// query database
function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows=[];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// Insert galeri
function galeri($data){
    global $conn;

    $gambar = upload();
    if(!$gambar){
        return false;
    }else{
        $query = "INSERT INTO galeri
                  VALUES
                  ('','$gambar')
                 ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
}
// End Insert galeri

// Insert squad
function squad($data){
    global $conn;

    $nama = $data['nama'];
    $divisi = $data['divisi'];
    $prestasi = $data['prestasi'];
    
    $gambar = upload();
    if(!$gambar){
        return false;
    }else{
        $query = "INSERT INTO squad
                  VALUES
                  ('','$gambar','$nama','$divisi','$prestasi')
                 ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
}
// Delete squad
function hapusSquad($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM squad WHERE idsquad = '$id'");
    return mysqli_affected_rows($conn);
}

// Insert squad
function member($data){
    global $conn;

    $squad = $data['squad'];
    $nama = $data['nama'];
    $role = $data['role'];
    $email = $data['email'];
    $tanggal = $data['date'];
    
    $gambar = upload();
    if(!$gambar){
        return false;
    }else{
        $query = "INSERT INTO member
                  VALUES
                  ('','$squad','$nama','$role','$email','$tanggal','$gambar')
                 ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
}
// Delete squad
function hapusMember($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM member WHERE idmember = '$id'");
    return mysqli_affected_rows($conn);
}
// End Insert Squad

// registrasi akun
function regist($data){
    global $conn;

    $nama = $data['nama'];
    $username = $data['username'];
    $nama = $data['nama'];
    $email = $data['email'];
    $ttl = $data['tanggal'];
    $profil = $data['profil'];
    $nomor = $data['telpon'];
    $password = $data['sandi'];
    $role = $data['role'];

    $query = "INSERT INTO user
              VALUES
              ('','$nama','$username','$email','$password','$ttl','$nomor','$profil','$role');
              ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
// Tambah akun(admin)
function user($data){
    global $conn;

    $nama = $data['nama'];
    $username = $data['username'];
    $nama = $data['nama'];
    $email = $data['email'];
    $ttl = $data['tanggal'];
    $nomor = $data['telpon'];
    $password = $data['sandi'];
    $role = $data['role'];

    $gambar = upload();
    if(!$gambar){
        return false;
    }else{
        $query = "INSERT INTO user
                  VALUES
                  ('','$nama','$username','$email','$password','$ttl','$nomor','$gambar','$role');
                  ";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
}
// Delete squad
function hapusUser($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM user WHERE iduser = '$id'");
    return mysqli_affected_rows($conn);
}

// Upload Gambar
function upload(){
    $namaGambar = $_FILES['foto']['name'];
    $eror = $_FILES['foto']['error'];
    $tmp_name  = $_FILES['foto']['tmp_name'];

    if($eror === 4){
        return false;
    }

    $fileSupport = ["jpg","png","jpeg","svg"];
    $ekstensi = explode(".", $namaGambar);
    $ekstensi = strtolower(end($ekstensi));

    if(!in_array($ekstensi, $fileSupport)){
        return false;
    }

    move_uploaded_file($tmp_name, '../img/'.$namaGambar);
    return $namaGambar;
}
?>