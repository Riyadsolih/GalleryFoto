<?php

	include "koneksi.php";
	$id = $_GET['FotoID'];
	$query1 = "delete from foto where FotoID='$id'";
	$result1 = mysqli_query($koneksi, $query1);

	if ($result1)
	{
		if(isset($_GET['status']))
		{
			echo "
				<script>
					alert('Data berhasil dihapus');
					window.location.href='admin.php';
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Data berhasil dihapus');
					window.location.href='foto.php';
				</script>
			
			";
		}
	}
	else
	{
		echo "
			<script>
				alert('Data GAGAL dihapus');
				window.location.href='foto.php';
			</script>
		
		";
	}



	// if (isset($_GET['status']))
	// {
		
	// 	header('location:admin.php');
	// }
	// else
	// {

	// 	header('location:foto.php');
	// }


?>