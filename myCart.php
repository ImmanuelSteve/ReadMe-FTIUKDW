<?php 
require 'koneksi.php'; 
require 'cart.php';	
$total = 0;
?>

<div class="grid_24 notop" >
    <h4 class="right nobottom" id="cart">
        <span class="cart_icon left"></span> 
        <span class="left"><?php 
	        	if (!empty($_SESSION['cart'])) {
			    $jumlah = 0;
	        	    foreach ($_SESSION['cart'] as $product_id => $quantity) {
				$jumlah = $jumlah + $quantity;
			    }
			    echo"".$jumlah."";
	        	}
	        	else
	        	{
	        		echo "0";
	        	}
        	?></span>
    </h4>
    <div class="clear"></div>
 	<!-- tampilin cart -->
 	<div id='myCart'>
 		<span id="cart_title" class="center">Keranjang Belanja</span>
		<table>
			<tbody>
				<!-- cek session start -->
				<?php if (!empty($_SESSION['cart'])) { 
					// perulangan start
					foreach ($_SESSION['cart'] as $product_id => $quantity) {
						$sql = "SELECT id, gambar, nama, harga FROM produk WHERE id = '".$product_id."'";
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
						<a href="<?php echo "produk.php?action=remove&id=".$data['id'].""; ?>"><img src="images/icon_close.gif"></a>
					</td>
					<td>
						<img src="<?php echo $data['gambar']; ?>" width="45px" height="45px">
					</td>
					<td>
						<a href="produkdetail.php?id=<?php echo $data['id']?>"><?php echo $data['nama']; ?></a>
					</td>
					<td>
						Rp <?php echo number_format($data['harga']); ?>
					</td>
					
				</tr>

				<?php } ?> <!-- perulangan end -->
				
				<tr>
					<td colspan='4'>
						<strong>Total Harga</strong>
					</td>
					<td>
						<strong>Rp <?php echo number_format($total); ?></strong>
					</td>
				</tr>
				 
				<?php } else { ?> <!-- cek session end -->

				<tr>
					<td colspan="5">
						<span class="center">Belum ada barang di keranjang belanja.</span>
					</td>
				</tr>

				<?php } ?> <!-- else end -->
			</tbody>
		</table>

		<!-- action button -->
		<a class="nodecor" href="<?php echo "produk.php?action=empty";  ?>">
			<span class="cart_action cart_action_blue">Kosongkan keranjang</span>
		</a>
		<a class="nodecor" href="pembayaran.php">
			<span class="cart_action cart_action_green">Pembayaran</span>
		</a>
 	</div> 	
	<!-- tampilin cart end -->
</div>
<?php mysqli_close($koneksi) ?>