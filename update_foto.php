<?php
include('koneksi.php');

// Check if all required fields are set in the $_POST array
if(isset($_POST['FotoID'], $_POST['JudulFoto'], $_POST['DeskripsiFoto'])) {
    // Assign values from $_POST array to variables
    $FotoID = $_POST['FotoID'];
    $JudulFoto = $_POST['JudulFoto'];
    $DeskripsiFoto = $_POST['DeskripsiFoto'];

    // Perform the update query
    $sql = mysqli_query($koneksi, "UPDATE foto SET JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto' WHERE FotoID='$FotoID'") or die(mysqli_error($koneksi));

    // Check if the query was successful
    if($sql) {
        echo '<script>alert("Berhasil memperbaharui data foto."); document.location="foto.php";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal memperbaharui data foto.</div>';
    }
} else {
    // Handle the case when required fields are missing
    echo '<div class="alert alert-warning">Semua field harus diisi.</div>';
}
?>
