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
                <a class="navbar-brand" href="#">KOMIDA</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="tambah.php">Tambah</a></li>


                </ul>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <div class="container" style="margin-top:20px">
        <h2>DAFTAR KARYAWAN</h2>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="active">No</td>
                    <td class="active">user ID</td>
                    <td class="active">Nama Karyawan</td>
                    <td class="active">Alamat</td>
                    <td class="active">No Handphone</td>
                    <td class="active">Opsi</td>
                </tr>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM table_user ORDER BY user_id DESC") or die(mysqli_error($koneksi));
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['user_id']; ?></td>
                        <td><?php echo $data['user_name']; ?></td>
                        <td><?php echo $data['user_address']; ?></td>
                        <td><?php echo $data['user_contact']; ?></td>
                        <td>
                            <a href="tambah.php" class="btn btn-primary">TAMBAH</a>
                            <a href="edit.php?user_id=<?php echo $data['user_id']; ?>" class="btn btn-warning">EDIT</a>
                            <a href="hapus.php?user_id=<?php echo $data['user_id']; ?>" class="btn btn-danger">HAPUS</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </table>
        </div>





    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>