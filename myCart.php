<?php 
	require 'koneksi.php';
	require 'cart.php';

	$url = $_SERVER['PHP_SELF'];
	$total = 0;
	//check cart kosong nggak
	 if(!empty($_SESSION['cart'])) {
		//tampilin cart
		echo "<table id='myChart' border='1'>";
			echo "<thead>";
				echo "<th colspan='4'>Keranjang Belanja</th>";
			echo "</thead>";
			echo "<tbody>";

			// perulangan start
			foreach($_SESSION['cart'] as $product_id => $quantity) {
				$sql = "SELECT gambar, nama, harga , hargaString FROM produk WHERE id = '".$product_id."'";
				$result = mysqli_query($koneksi,$sql);

				$data = mysqli_fetch_assoc($result);
				$found = mysqli_num_rows($result);
				//check ada produk e nggak
				if ( $found > 0) {
					$line_cost = $data['harga'] * $quantity; //harga perline
            		$total = $total + $line_cost; //total cost

				}
				echo "<tr>";
					echo "<td>".$quantity."</td>";
					echo "<td><img src='".$data['gambar']."'></td>";
					echo "<td>".$data['nama']."</td>";
					echo "<td>Rp ".$data['hargaString']."</td>";
				echo "</tr>";
			}
			// perulangan end

				echo "<tr>";
					echo "<td colspan='3'>Total Harga</td>";
					echo "<td>Rp ".$total."</td>";
				echo "</tr>";
			echo "</tbody>";
		echo "</table>";
	}
	else {
		echo "Belum ada barang di keranjang belanja.";
	}

	echo "<a href='$url?action=empty'>kosongkan</a>";

	mysqli_close($koneksi);
 ?>