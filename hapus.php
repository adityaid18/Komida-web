<?php 
include('./database/config.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $cek =mysqli_query($koneksi, "SELECT * FROM table_user WHERE user_id='$user_id'") or die(mysqli_error($koneksi));

    if(mysqli_num_rows($cek) > 0){

        $delete = mysqli_query($koneksi, "DELETE FROM table_user WHERE user_id='$user_id'") or die(mysqli_error($koneksi));
        if($delete){
            echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
        }else {
            echo
            'script>alert("Gagal menghapus data."); document.location="index.php";</script>';
        }
    } else {
        echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php";</script>';
    }
}

?>