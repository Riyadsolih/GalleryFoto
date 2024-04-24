<?php
// Load file koneksi.php
include "koneksi.php";
session_start();

// Ambil Data yang Dikirim dari Form
$judul_foto = $_POST['JudulFoto'];
$deskripsi_foto = $_POST['DeskripsiFoto'];
$tanggal_unggah = date('Y-m-d');

$nama_file = $_FILES['LokasiFile']['name'];
$album_id = $_POST['AlbumID'];
$user_id = $_SESSION['UserID'];
$ukuran_file = $_FILES['LokasiFile']['size'];
$tipe_file = $_FILES['LokasiFile']['type'];
$tmp_file = $_FILES['LokasiFile']['tmp_name'];

// Set path folder tempat menyimpan gambarnya
$path = "images/".$nama_file;

if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
	// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
	if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
		// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
		// Proses upload
		if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
			// Jika gambar berhasil diupload, Lakukan :	
			// Proses simpan ke Database
			$query = "INSERT INTO foto(JudulFoto, DeskripsiFoto, TanggalUnggah, LokasiFile, AlbumID, UserID) VALUES('".$judul_foto."','".$deskripsi_foto."','".$tanggal_unggah."','".$nama_file."','".$album_id."','".$user_id."')";
			$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
			
			if($sql){ // Cek jika proses simpan ke database sukses atau tidak
				// Jika Sukses, Lakukan :
				echo '<script>alert("Berhasil menambah foto."); document.location="foto.php";</script>';
			}else{
				// Jika Gagal, Lakukan :
				echo '<script>alert("Terjadi kesalahan saat mencoba untuk menyimpan data ke database."); document.location="foto.php";</script>';
			}
		}else{
			// Jika gambar gagal diupload, Lakukan :
			echo '<script>alert("Foto Gagal diupload."); document.location="foto.php";</script>';
		}
	}else{
		// Jika ukuran file lebih dari 1MB, lakukan :
		echo '<script>alert("Ukuran foto tidak boleh lebih dari 1MB."); document.location="foto.php";</script>';
	}
}else{
	// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
	echo '<script>alert("Tipe foto salah"); document.location="foto.php";</script>';
}
?>
