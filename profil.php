<?php
session_start();
if(!isset($_SESSION['UserID'])){
    header("location:login.php");
    exit;
}

include 'koneksi.php';

$userID = $_SESSION['UserID'];
$query = "SELECT * FROM user WHERE UserID = '$userID'";
$result = mysqli_query($koneksi, $query);
$user = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $username   = $_POST['user'];
    $Email  = $_POST['email'];
    $NamaLengkap   = $_POST['NamaLengkap'];
    $Alamat = $_POST['alamat'];
    
    $update = mysqli_query($koneksi, "UPDATE user SET 
                  Username = '$username',
                  Email = '$Email',
                  NamaLengkap = '$NamaLengkap',
                  Alamat = '$Alamat'
                  WHERE userID = '$userID'");
    if($update){
        echo '<script>alert("Ubah data berhasil")</script>';
        echo '<script>window.location="profil.php"</script>';
    }else{
        echo 'gagal '.mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Galeri Foto</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<style>
    /* Style untuk form ubah profil */
.profile-info .box {
    margin-bottom: 20px;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 5px;
}

.profile-info label {
    font-weight: bold;
}

.profile-info input[type="text"],
.profile-info input[type="email"],
.profile-info input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 2px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.profile-info input[type="submit"] {
    padding: 5px 10px;
    margin: 10px 0 8px;
    border: 2px;
    border-radius: 4px
}   

/* Style untuk form ubah password */
.change-password {
    margin-top: 30px;
}

.change-password h3 {
    text-align: center;
    margin-bottom: 20px;
}

.change-password .box {
    background-color: #f9f9f9;
    border-radius: 5px;
    padding: 20px;
}

.change-password label {
    font-weight: bold;
}

.change-password input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: p2x 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.change-password input[type="submit"] {
    padding: 5px 10px;
    margin: 10px 0 8px;
    border: 2px;
    border-radius: 4px;
}
</style>
<!-- body -->
<body class="main-layout">
<!-- loader  -->
<!-- loader  -->
<!-- end loader -->
<!-- header -->
<header>
    <!-- header inner -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <a href="index.php"><img src="images/logory.jpg" alt="#" /></a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <?php if(!isset($_SESSION['UserID'])){ ?>
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="login.php">Login</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="register.php">Register</a>
                                    </li>
                            <?php }else{ ?>
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="beranda.php">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Galeri</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="profil.php">Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="foto.php">Foto</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- end header inner -->
<!-- end header -->
<div class="back_re">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>
</div>
<!--  contact -->
<div class="section">
    <div class="container">
        <br>
        <h2 align="center"> Silahkan Ubah Profil Anda </h2>
        <br>
        <div class="profile-info">
            <div class="box">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="username">Username:</label>
                            <input type="text" name="user" id="username" placeholder="Username" class="contactus" value="<?php echo isset($user['Username']) ? $user['Username'] : '' ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Email" class="contactus" value="<?php echo isset($user['Email']) ? $user['Email'] : '' ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="nama-lengkap">Nama Lengkap:</label>
                            <input type="text" name="NamaLengkap" id="nama-lengkap" placeholder="Nama Lengkap" class="contactus" value="<?php echo isset($user['NamaLengkap']) ? $user['NamaLengkap'] : '' ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Alamat" class="contactus" value="<?php echo isset($user['Alamat']) ? $user['Alamat'] : '' ?>" required>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" name="submit" value="Ubah Profil" class="send_btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="change-password">
            <h3 align="center">Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <div class="col-md-12">
                        <label for="password-baru">Password Baru:</label>
                        <input type="password" name="pass1" id="password-baru" placeholder="Password Baru" class="contactus" required>
                    </div>
                    <div class="col-md-12">
                        <label for="konfirmasi-password">Konfirmasi Password Baru:</label>
                        <input type="password" name="pass2" id="konfirmasi-password" placeholder="Konfirmasi Password Baru" class="contactus" required>
                    </div>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="send_btn">
                </form>
                <?php
                if(isset($_POST['ubah_password'])){
                    $pass1   = MD5($_POST['pass1']);
                    $pass2   = MD5($_POST['pass2']);
                    if($pass2 != $pass1){
                        echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                    }else{
                        $u_pass = mysqli_query($koneksi, "UPDATE user SET 
                                  Password = '$pass1'
                                  WHERE UserID = '$userID'");
                        if($u_pass){
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'gagal '.mysqli_error($koneksi);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- end contact -->
<!--  footer -->
<footer>
      <div class="">
        <div class="copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-10 offset-md-1">
                <p>© 2024 Gallery Foto.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
