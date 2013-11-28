<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="Description" content="readmeshop.com, gadget, smartphone, toko online, online shop, toko gadget"/>
    <title>FAQ - ReadMe Shop</title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/faq.css" />
    <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/jquery.lavalamp.min.js"></script>
    <script type="text/javascript" src="js/lamp.js"></script>
</head>

<body>
    <!-- header begin -->
    <div id="header">
        <div class="container_24">
            <div class="grid_4">
                <img src="images/readmeshoplogo.png" height="100" width="110"/>
            </div>
            <!--login-->
            <?php
                $_SESSION['actionlogin'] = "faq.php";
                include("login.php");
            ?>
            <div class="grid_24" id="header_nav">
                <ul class="lavaLamp">
                    <li class="current"><a href="index.php">Beranda</a> </li>
                    <li><a href="produk.php">Produk </a></li>
                    <li><a href="promosi.php">Promosi </a></li>
                    <li><a href="tentangkami.php">Tentang kami </a></li>
                </ul>
                <div id="formsearch" class="grid_6">
                    <form accept-charset="utf-8" method="post" action="cari.php">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="textsearch" type="search" required x-moz-errormessage="Inputan jangan kosong !" size="22" value="" name="search" placeholder="cari produk"></input>
                                </td>
                                <td>
                                    <input id="buttonsearch" type="submit" style="cursor:pointer;" value="" name=""></input>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
            
            <div class="clear"></div>
        
        </div>
    </div>
    <!-- header end -->
    
    <!-- content begin -->
    <div id="content">
        <div class="container_24">
            <div id="contentarea" class="grid_24">
                <h1>FAQ ReadMe Shop</h1>
                <h3>FAQ -> Pemesanan</h3>
                <p class="justify"><div class="pertanyaan">T: Handphone apa saja yang dijual <a href=" http://www.readmeshop.revti.com">www.readmeshop.revti.com</a>?</div>J:  Kami menjual featured phone dan smartphone bergaransi resmi dari vendor, lengkap dengan pilihan aksesoris original (OEM) dan branded (capdase, ferrari, novero, garskin, casemate, dll).</p>
                <p class="justify"><div class="pertanyaan">T:  Apakah <a href="http://www.readmeshop.revti.com">readmeshop.com</a> menerima pesanan dari luar Indonesia?</div>J: Untuk sementara waktu, kami belum menerima pesanan internasional. </p>
                <p class="justify"><div class="pertanyaan">T: Pesanan saya baru saja datang, tapi ada beberapa kerusakan bawaan pabrik pada unit nya Apa yang harus saya lakukan?</div>J: Kami mohon maaf untuk masalah yang terjadi. Harap hubungi Customer Service kami di Hotline 08123456789 selama hari kerja (khusus pemesanan) dan email CCare di ccare@readmeshop.co.id.</p>        
                <h3>FAQ -> Pembayaran</h3>
                <p class="justify"><div class="pertanyaan">T: Cara pembayaran apa saja yang diterima <a href="http://www.readmeshop.revti.com">readmeshop.com</a>?</div>J: Kami menerima pembayaran melalui transfer KLIK BCA, atau transfer melalui ATM BCA dan bank lainnya ke rekening BCA kami sebagai berikut :<br><br><div class="rekening">Nama Akun: PT. ReadMe Shop<br>Nomer Akun : 883 456 8888<br>Swift Code : PROGWEBA(untuk transfer dari luar negeri)</div><br>Anda juga bisa membayar pada saat barang anda dikirim oleh kurir kami (Cash On Delivery) dengan menggunakan EDC mesin wireless dari Bank Mandiri dan BCA. Silakan tentukan cara pembayaran yang Anda kehendaki pada waktu memesan, dan kami akan memberikan instruksi cara pembayaran.</p>
                <p class="justify"><div class="pertanyaan">T: Saya ingin membayar online dengan kartu kredit. Mengapa tidak bisa?</div>J: Saat ini, cara pembayaran ini belum kami sediakan.</p>
                <h3>FAQ -> Pengiriman</h3>
                <p class="justify"><div class="pertanyaan">T: Ke mana sajakah <a href="http://www.readmeshop.revti.com">readmeshop.com</a> dapat mengirim pesanan?</div>J: Kami mengirim ke hampir seluruh wilayah Indonesia. Cara pengiriman akan diatur oleh kami dengan time interval yang akan dikonfirmasikan kepada anda terlebih dahulu sebelum pengiriman. Adalah sangat bermanfaat bagi kami, bila anda memasukkan alamat dengan jelas disertai identitas lokal (area.....) dan kecamatan / kabupaten serta kode pos dan nomor telepon yang bisa kita hubungi.</p>
                <p class="justify"><div class="pertanyaan">T: Kota saya tidak terdaftar? Jadi, saya tidak bisa menggunakan layanan <a href="http://www.readmeshop.revti.com">readmeshop.com</a>?</div>J: Kami hanya memuat kota-kota di mana kami dapat menjamin waktu pengiriman. Tapi, kemungkinan besar kami juga dapat mengirim ke kota Anda. Silahkan menghubungi hotline kami di 08123456789 selama hari kerja.</p>
                <h3>FAQ -> Privasi</h3>
                <p class="justify"><div class="pertanyaan">T: Apa saja data pribadi yang dikumpulkan oleh <a href="http://www.readmeshop.revti.com">readmeshop.com</a>?</div>J: <a href="http://www.readmeshop.revti.com">readmeshop.com</a> hanya mengumpulkan data yang diinput melalui form member pada awal registrasi antara lain: nama, alamat, no handphone dan lainnya. Kami tidak mengumpulkan informasi lainnya.</p>
                <p class="justify"><div class="pertanyaan">T: Apa yang dilakukan <a href="http://www.readmeshop.revti.com">readmeshop.com</a> dengan data pribadi yang terkumpul?</div>J: Data yang kami kumpulkan disimpan secara aman dalam server kami.</p>
                <p class="justify"><div class="pertanyaan">T: Apakah <a href="http://www.readmeshop.revti.com">readmeshop.com</a> berbagi data pelanggan? Saya paling benci menerima junk mail.</div>J: Kami tidak membagikan database pelanggan kami kepada orang lain. Karena ini bersifat pribadi dan confidential. Kami akan melindungi sepenuh nya data-data dari pelanggan kami.</p>
                <p class="justify"><div class="pertanyaan">T: Apakah <a href="http://www.readmeshop.revti.com">readmeshop.com</a> mengumpulkan informasi mengenai komputer pribadi saya?</div>J: Kami tidak mengumpulkan informasi apa pun, kecuali yang dikirimkan secara eksplisit oleh pengguna.</p>
            </div>
           
        </div>
    </div>
    <!-- content end -->

    <!-- footer begin -->
    <?php
        require("footer.php");
    ?>
    <!-- footer end -->

</body>
</html>
