<?php
session_start();
if(!isset($_SESSION['UserID'])){
header("location:login.php");
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
                                 <a class="nav-link" href="profil.php">Profil</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="foto.php">Foto</a>
                              </li>
                              <li class="nav-item ">
                                 <a class="nav-link" href="logout.php">Logout</a>
                              </li>
                           </ul>
                           </ul>						   <?php
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
                <h2 class="card-title">Tambah Foto</h2>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form" action="tambah_foto.php" method="post" enctype="multipart/form-data">
							<div class="card-body">
							  <div class="form-group">
								<label for="">JudulFoto</label>
								<input type="text" class="form-control" id="" placeholder="JudulFoto" name="JudulFoto">
							  </div>
							  <div class="form-group">
								<label for="">Deskripsi</label>
								<input type="text" class="form-control" id="" placeholder="DeskripsiFoto" name="DeskripsiFoto">
							  </div>
							  <div class="form-group">
								<label for="">Tanggal Unggah</label>
								<input type="date" class="form-control" id="" placeholder="TanggalUnggah" name="TanggalUnggah">
							  </div>
							  <div class="form-group">
								<label for="">File</label>
								<div class="">
									<input type="file" class="form-control"  name="LokasiFile">
								</div>
							  </div>
							  
							  <div class="form-group">
								  <label>AlbumID</label>
								  <select class="form-control select2" name="AlbumID" style="width: 100%;">
								  <?php
								include 'koneksi.php';
								$UserID=$_SESSION['UserID'];
								$sql=mysqli_query($koneksi, "select * from album");
								while($data=mysqli_fetch_array($sql)){
							  ?>
									<option value="<?=$data['AlbumID']?>"><?=$data['NamaAlbum']?></option>
									<?php
								}
							  ?>
								  </select>
							  </div>
							  
							  <div class="form-group">
								<div class="">
									<button type="submit" class="btn btn-block btn-outline-info btn-flat">Submit</button>
									<button type="reset" class="btn btn-block btn-outline-danger btn-flat">Hapus</button>
								</div>
							  </div>
							</div>
						  </form>
            </div>
            </div>
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
    </section>
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Halaman Foto</h2>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>       
					<th>ID</th>
					<th>Judul</th>
					<th>Deskripsi</th>
					<th>Tanggal Unggah</th>
					<th>Lokasi File</th>
					<th>Album</th>
					<th>Aksi</th>
                  </tr>
                  </thead>
                  		<?php
					include "koneksi.php";
					$UserID=$_SESSION['UserID'];
					$query = "select * from foto, album where foto.UserID='$UserID' and foto.AlbumID=album.AlbumID";
					$result = mysqli_query($koneksi, $query);
					if($result) //artinya jika query berhasil dijalankan  
					{
						while($data = mysqli_fetch_assoc($result))
						{
							$fotoid = $data['FotoID'];
							echo "<tr align='center'>";
							echo "<td>" . $data['FotoID'] . "</td>";
							echo "<td>" . $data['JudulFoto'] . "</td>";
							echo "<td>" . $data['DeskripsiFoto'] . "</td>";
							echo "<td>" . $data['TanggalUnggah'] . "</td>";
							echo "<td>" . "<img src='images/".$data['LokasiFile']."' width='200'>" . "</td>";   
							echo "<td>" . $data['NamaAlbum'] . "</td>";
							echo "<td><a href='edit_foto.php?FotoID=$fotoid' class='btn btn-block btn-outline-info btn-flat'><i class=''></i>Edit </a>";
							echo "<a href='hapus_foto.php?FotoID=$fotoid' class='btn btn-block btn-outline-danger btn-flat' onclick='return confirm(\"Yakin ingin menghapus foto ini?\")'><i class=''></i>Hapus</a></td>";
							
							echo "</tr>";
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

