<?php 
require 'koneksi.php'; 
require 'cart.php';	
$total = 0;
?>

<div class="grid_24">
    <h4 class="right" id="cart">
        <span class="cart_icon left">
        </span> 
        <span class="left">
        	<?php 
	        	if (!empty($_SESSION['cart'])) {
	        		echo count($_SESSION['cart']);
	        	}
	        	else
	        	{
	        		echo "0";
	        	}
        	?>
        </span>
    </h4>
    <div class="clear"></div>   
 
 	<!-- tampilin cart -->
	<table id='myChart' border='0' class='right'>
		<thead>
			<th colspan="4">
				Keranjang Belanja
			</th>
		</thead>
		<tbody>
			<!-- cek session start -->
			<?php if (!empty($_SESSION['cart'])) { 
				// perulangan start
				foreach ($_SESSION['cart'] as $product_id => $quantity) {
					$sql = "SELECT gambar, nama, harga , hargaString FROM produk WHERE id = '".$product_id."'";
					$result = mysqli_query($koneksi,$sql) or die(mysql_error());

					$data = mysqli_fetch_assoc($result) or die(mysql_error());
					$found = mysqli_num_rows($result) or die(mysql_error());
					//check ada produk e nggak
					if ( $found > 0) {
					    $line_cost = $data['harga'] * $quantity; //harga perline
						$total = $total + $line_cost; //total cost
					}
			?>

			<tr>
				<td>
					<?php echo $quantity; ?>
				</td>
				<td>
					<img src="<?php echo $data['gambar']; ?>" width="45px" height="45px">
				</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
				<td>
					Rp <?php echo number_format($data['harga']); ?>
				</td>
			</tr>

			<?php } ?> <!-- perulangan end -->
		
			<tr>
				<td colspan='3'>
					Total Harga
				</td>
				<td>
					Rp <?php echo number_format($total); ?>
				</td>
			</tr>
			 
			<?php } else { ?> <!-- cek session end -->

			
			
			<tr>
				<td>
					Belum ada barang di keranjang belanja.
				</td>
			</tr>

			<?php } ?> <!-- else end -->
			
			<tr>
				<td>
					<a href="<?php echo "produk.php?action=empty";  ?>">Kosongkan keranjang</a>
				</td>
			</tr>
		</tbody>
	</table>
	<!-- tampilin cart end -->

<?php mysqli_close($koneksi) ?>