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
	  <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
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
						session_start();
						if(!isset($_SESSION['UserID'])){
						?>
                           <ul class="navbar-nav mr-auto">
						   <li class="nav-item ">
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
	  <br>
	  <br>
      <!--  contact -->
	 <form class="form-inline ml-3" method="GET" action="index.php">
	  <div class="input-group input-group-sm">
	   <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="kata_cari" value="<?php if (isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>">
	    <div class="input-group-append">
		 <button class="btn btn-navbar" type="submit">
		  <i class="fa fa-long-arrow-right"></i>
		 </button>
		</div>
	   </div>
	 </form>
	 <br>
     <section class="content">
      <div class="container-fluid">
		<div class="services_section_2">
		  <div class="row">
			<div class="col-md-12">
			  <div class="row">
				<?php
				  include 'koneksi.php';
				  if(isset($_GET['kata_cari'])) {
					$kata_cari = $_GET['kata_cari'];
					$query = "SELECT * FROM foto WHERE FotoID like '%".$kata_cari."%' OR JudulFoto like '%".$kata_cari."%' OR DeskripsiFoto like '%".$kata_cari."%'  ORDER BY FotoID ASC";
				  } else {
				  $query = "SELECT * FROM foto where FotoID";
				  }
				  $result = mysqli_query($koneksi, $query);
				  if (!$result) {
					die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
				  }
				  $no = 1;
				  while ($data = mysqli_fetch_assoc($result)) {
				?>
				<div class="col-md-4">
				  <div class="card card-widget">
					
					
					<div class="card-body">
          <p class="nama"><?php echo $data['TanggalUnggah']; ?></p>
            <a href="detail_image.php?file=<?=$data['LokasiFile']?>" data-title="<?=$data['JudulFoto']?>" data-gallery="gallery" width="500">
					  <img class="d-block w-100" src="images/<?=$data['LokasiFile']?>" width="200px"></a>
					  <a href="like.php?FotoID=<?=$data['FotoID']?>"  type="button" class="btn btn-default btn-sm"><i class="">Like</i></a>
					  <a href="komentar.php?FotoID=<?=$data['FotoID']?>"  type="button" class="btn btn-default btn-sm"><i class="">Komentar</i></a>

					  <span class="float-right text-muted"><?php
						$FotoID=$data['FotoID'];
						$sql2=mysqli_query($koneksi, "select * from likefoto where FotoID='$FotoID'");
						echo mysqli_num_rows($sql2);
					  ?>&nbsp;Likes
					  </span>
					</div>
				  </div>
				</div>
				<?php $no++; } ?>
			  </div>
			</div>
		  </div>
		</div>	
      </div>
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
	  <script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
	  	  <script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
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

