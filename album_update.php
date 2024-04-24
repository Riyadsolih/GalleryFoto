<?php
	include('koneksi.php');
	$AlbumID		=	$_POST['AlbumID'];
	$NamaAlbum	=	$_POST['NamaAlbum'];
	$Deskripsi	=	$_POST['Deskripsi'];
	
	$sql	=	mysqli_query($koneksi, "UPDATE album SET AlbumID='$AlbumID', NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi' WHERE AlbumID='$AlbumID'") or die(mysqli_error($koneksi));
	
	if(sql)
	{
		echo '<script>alert("Berhasil menyimpan data.");		document.location="admin.php";</script>';
	}
		else
	{
		echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
	}
?>