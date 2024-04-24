<?php
include 'koneksi.php';

// Check if 'file' parameter exists in the URL
if(isset($_GET['file'])) {
    // Fetch image details based on the provided file name
    $file = $_GET['file'];
    $query = "SELECT * FROM foto WHERE LokasiFile = '$file'";
    $result = mysqli_query($koneksi, $query);

    // Check if the query was successful and if there is at least one row returned
    if($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        // If no image with the provided file name is found
        echo "Image not found.";
        exit;
    }
} else {
    // If 'file' parameter is not provided in the URL
    echo "No image file provided.";
    exit;
}

// Query to get total likes
$query_likes = "SELECT COUNT(*) AS total_likes FROM likefoto WHERE FotoID = '{$data['FotoID']}'";
$result_likes = mysqli_query($koneksi, $query_likes);
$row_likes = mysqli_fetch_assoc($result_likes);
$total_likes = $row_likes['total_likes'];

// Query to get total comments
$query_comments = "SELECT COUNT(*) AS total_comments FROM komentarfoto WHERE FotoID = '{$data['FotoID']}'";
$result_comments = mysqli_query($koneksi, $query_comments);
$row_comments = mysqli_fetch_assoc($result_comments);
$total_comments = $row_comments['total_comments'];

// Query to get comments
$query_get_comments = "SELECT * FROM komentarfoto JOIN user ON komentarfoto.UserID = user.UserID WHERE FotoID='{$data['FotoID']}'";
$result_get_comments = mysqli_query($koneksi, $query_get_comments);
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
	  <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
	  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	  
   </head>
   <style>
      
   </style>
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
   <body>
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
      <!-- Konten sebelumnya -->
      <div class="container ">
         <div class="row">
            <div class="col-md-8 offset-md-2">
               <p><strong> <?php echo $data['JudulFoto']; ?></strong></p>
               <p><strong>Tanggal Unggah:</strong> <?php echo $data['TanggalUnggah']; ?></p>
               <img src="images/<?php echo $data['LokasiFile']; ?>" class="img-fluid" alt="<?php echo $data['JudulFoto']; ?>">
               <p><strong>Deskripsi:</strong> <?php echo $data['DeskripsiFoto']; ?></p>

               <!-- Menampilkan total like -->
               <p><strong>Total Like:</strong> <?php echo $total_likes; ?></p>

               <!-- Menampilkan total komentar -->
               <p><strong>Total Komentar:</strong> <?php echo $total_comments; ?></p>
               
               <!-- Daftar komentar -->
               <div class="comments">
                  <?php
                  while($comment = mysqli_fetch_assoc($result_get_comments)) {
                     echo "<p><strong>" . $comment['NamaLengkap'] . "</strong>: {$comment['IsiKomentar']}</p>";
                  }
                  ?>
               </div>
               
               <!-- Add your like and comment buttons here -->
            </div>
         </div>
      </div>
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

