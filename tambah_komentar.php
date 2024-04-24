<?php
	include 'koneksi.php';
	session_start();

		$FotoID = $_POST['FotoID'];
		$UserID = $_SESSION['UserID'];
		$IsiKomentar = $_POST['IsiKomentar'];
		$TanggalKomentar = date('Y-m-d');

		$sql = mysqli_query($koneksi, "insert into komentarfoto value ('', '$FotoID', '$UserID', '$IsiKomentar', '$TanggalKomentar')");

		if($sql)
		  {
			echo "'<script>alert('Berhasil menambahkan komentar.')</script>'";
			header("location:komentar.php?FotoID=" .$FotoID);
		  }
			else
		  {
			echo "'<script>alert('Gagal menambahkan komentar.');</script>'";
			header("location:komentar.php?FotoID=" .$FotoID);
		  }

	?>