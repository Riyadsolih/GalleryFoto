<?php
	include('koneksi.php');
	$AlbumID				=$_POST['AlbumID'];
	$NamaAlbum				=$_POST['NamaAlbum'];
	$Deskripsi				=$_POST['Deskripsi'];


			$sql	= mysqli_query($koneksi, "UPDATE album SET NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi' WHERE AlbumID='$AlbumID'") or die(mysqli_error($koneksi));
			
			if($sql)
			{
				echo '<script>alert("Berhasil memperbaharui data album.");
						document.location="admin.php";</script>';
			}
			else
			{
				echo '<div class="alert alert-warning">Gagal memperbaharui data album.</div>';
			}
			?>		
			