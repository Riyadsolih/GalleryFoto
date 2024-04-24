
<?php
	include 'koneksi.php';
	session_start();

	if(!isset($_SESSION['UserID'])){
		//untuk komentar harus login dulu
		echo '<script>alert("Login terlebih dahulu"); document.location="login.php";</script>';
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
	  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   </head>
   <!-- body -->
   <body class="main-layout">
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
						<?php
		
		if(!isset($_SESSION['UserID'])){
		?>
                           <ul class="navbar-nav mr-auto">
						   <li class="nav-item  	 ">
                                 <a class="nav-link" href="login.php">Login</a>
                              </li>
							  <li class="nav-item ">
                                 <a class="nav-link" href="register.php">Register</a>
                              </li>
							  <?php
		}else{
		?>
                              <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="beranda.php">Dashboard</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="index.php">Galeri</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="album.php">Album</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="foto.php">Foto</a>
                              </li>
                              <li class="nav-item ">
                                 <a class="nav-link" href="logout.php">Logout</a>
                              </li>
                           </ul>
                           </ul>
						   <?php
		}
		?>
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
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h2 class="card-title">Komentar Foto</h2>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php
			include('koneksi.php');
			$FotoID = $_GET['FotoID'];
			$select = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'") or die(mysqli_error($koneksi));
			$data = mysqli_fetch_assoc($select);
			?>
              <form role="form" method="POST" action="tambah_komentar.php" id="quickForm">
                <div class="card-body">
				<input type="text" name="FotoID" placeholder="FotoID" required value="<?php echo $data ['FotoID']?>" hidden ></input>
				<div class="form-group">
                    <label for="exampleInputEmail1">Judul Foto</label>
                    <input type="text" name="JudulFoto" class="form-control" readonly value="<?php echo $data['JudulFoto']?>" id="exampleInputEmail1" placeholder="Judul Foto">
                  </div>
				<div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi Foto</label>
                    <input type="text" name="DeskripsiFoto" class="form-control" readonly value="<?php echo $data['DeskripsiFoto']?>" id="exampleInputEmail1" placeholder="Deskripsi Foto">
                  </div>
				<div class="form-group">
								<label for="">File</label>
								<div class="">
									<img src="images/<?=$data['LokasiFile']?>" width="200px">
								</div>
							  </div>
							  <div class="form-group">
                    <label for="exampleInputEmail1">Komentar Foto</label>
                    <input type="text" name="IsiKomentar" class="form-control"  id="exampleInputEmail1" placeholder="Isi Komentar">
                  </div>
							  
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-outline-info btn-flat">Tambah Komentar</button>
				  <a href="album.php" type="" class="btn btn-block btn-outline-danger btn-flat">Batal</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
	<section class="content">
      <div class="container-fluid">
        <div class="row">
		
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Halaman Album</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr align="center">
                  <th>Nama Lengkap</th>
                    <th>User ID</th>

                    <th>Isi Komentar</th>
					<th>Tanggal Komentar</th>
                  </tr>
                  </thead>
                 <?php
					include "koneksi.php";
					$UserID=$_SESSION['UserID'];
					$query = "select * from komentarfoto,user where komentarfoto.UserID=user.UserID";
					$result = mysqli_query($koneksi, $query);
					if($result) //artinya jika query berhasil dijalankan
					{
						while($data = mysqli_fetch_assoc($result))
						{
							echo "<tr align='center'>";
              echo "<td>" . $data['NamaLengkap'] . "</td>";
							echo "<td>" . $data['UserID'] . "</td>";
							echo "<td>" . $data['IsiKomentar'] . "</td>";
							echo "<td>" . $data['TanggalKomentar'] . "</td>";
							
						}
					}
					echo "</table>";
				  ?>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
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
	  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
	  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
   </body>
</html>

