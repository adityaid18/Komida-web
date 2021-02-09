<?php
include('./database/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CRUD PHP MYSQL</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">KOMIDA</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="tambah.php">Tambah</a></li>


                </ul>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <?php
    if (isset($_POST['submit'])) {
        $user_name = $_POST['user_name'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];

        $cek = mysqli_query($koneksi, "SELECT * FROM table_user WHERE user_name='$user_name'") or die(mysqli_error($koneksi));
        if (mysqli_num_rows($cek) == 0) {
            $sql = mysqli_query($koneksi, "INSERT INTO table_user(user_name, user_address, user_contact) VALUES('$user_name','$user_address','$user_contact')") or die(mysqli_error($koneksi));

            if ($cek) {
                echo '<script>alert("Berhasil Menambah Data"); document.location="tambah.php";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal Melakukan proses tambah data</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Gagal, Nama Sudah terdaftar</div>';
        }
    }
    ?>


    <div class="container" style="margin-top:20px">
        <h2>TAMBAH KARYAWAN</h2>
        <div class="col-md-4">
            <form method="post" action="tambah.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Karyawan</label>
                    <input type="text" name="user_name" class="form-control" placeholder="Nama Karyawan">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">ALamat</label>
                    <input type="text" name="user_address" class="form-control" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">No Handphone</label>
                    <input type="text" name="user_contact" class="form-control" placeholder="No Telp">
                </div>
                <!-- <button type="submit" name="submit" value"SIMPAN" class="btn btn-default">Submit</button> -->
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
            </form>
        </div>

    </div>





    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>