<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="Description" content="readmeshop.com, gadget, smartphone, toko online, online shop, toko gadget"/>
    <title>Syarat&Kondisi - ReadMe Shop</title>
    <link rel="icon" type="image/png" href="images/icon-readmeshop.png" />
    <link rel="stylesheet" href="css/960_24_col.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/syarat&kondisi.css" />
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
                $_SESSION['actionlogin'] = "syarat&kondisi.php";
                include("login.php");
            ?>
            <?php include ("myCart.php") ?>
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
                <h1>Syarat dan Kondisi ReadMe Shop</h1>
                <p class="justify">Selamat datang di website ReadMe Shop : <a href=" http://www.readmeshop.revti.com">http://www.readmeshop.revti.com.</a><br><br>Layanan yang disediakan oleh web ini dilakukan dengan berpedoman kepada Syarat dan Ketentuan Layanan. MOHON MEMBACA TERLEBIH DAHULU SYARAT DAN KETENTUAN TENTANG LAYANAN SEBELUM MEMPERGUNAKAN JASA LAYANAN WEBSITE INI.<br><br>
Informasi dan data yang disediakan oleh ReadMe Shop semata-mata hanya untuk kepentingan pemberian informasi. Selanjutnya dengan mempergunakan, mengakses dan melakukan proses pengunduhan informasi dan data atas website, pengguna setuju untuk tunduk dan patuh kepada syarat dan ketentuan sebagaimana dinyatakan dalam syarat dan ketentuan ini, yang berlaku untuk seluruh website ReadMe Shop, baik yang ada sekarang, pengembangan maupun yang baru di masa yang akan datang. ReadMe Shop berhak  dari waktu ke waktu/setiap saat untuk melakukan revisi dan perbaikan atas syarat dan ketentuan ini. Pengguna layanan diminta untuk secara rutin membaca update atas ketentuan syarat dan ketentuan website yang mengikat pengguna. Apabila pengguna tidak setuju atas syarat dan ketentuan website, mohon untuk tidak mempergunakan website ini.
                   </p>
                <h2>PEMBATASAN/LARANGAN</h2>
                <p class="justify">Pengguna dapat melihat, mengakses, mengunduh dan mengcopy informasi dan data yang tersedia di website semata-mata hanya untuk kepentingan pribadi, bukan kepentingan komersial. Pengguna dapat mempergunakan informasi dan data tersebut untuk kepentingan lembaganya sepanjang hal tersebut guna mendukung kepentingan produk-produk ReadMe Shop. Sebagaimana dinyatakan dalam ketentuan pengunaan, pengguna sepakat untuk tidak merubah bentuk atau merevisi setiap informasi dan data dalam segala bentuk atau turunannya dan tetap mencantumkan/mempertahankan segala Hak Kekayaan Intelektual dan segala hak-hak serta pemberitahuan yang terkandung dalam informasi dan data tersebut dalam semua copy. Penggunaan diluar yang ditentukan dalam syarat dan ketentuan ini adalah terlarang. Setiap pelanggaran atas hal yang telah ditentukan dalam syarat dan kondisi dapat berakibat hukum berupa somasi dan gugatan secara perdata/pidana. </p>
                <h2>HAKI ATAS INFORMASI  DAN DATA</h2>
                <p class="justify">Informasi dan data-data  (termasuk tetapi tidak terbatas kepada kerta-kertas kerjas, siaran pers, list data, deskripsi produk dan FAQ) yang tersedia dalam atau dari website adalah hak milik intektual dari ReadMe Shop dan penggunaan tanpa ijin informasi dan materias-material tersebut dapat terkena pelanggaran atas hukum Hak Kekayaan Intelektual dan hukum-hukum lain yang terkait.</p>
                <h2>MEREK DAGANG</h2>
                <p class="justify">Merek Dagang ReadMe Shop hanya dapat dipergunakan dengan ijin tertulis terlebih dahulu dari ReadMe Shop. Nama, Produk dan Merek ReadMe Shop adalah merek dagang yang terdaftar di Direktorat Jendral Hak dan Kekayaan Intelektual. Selain yang secara sah milik ReadMe Shop, nama, merek dagang dan logo-logo adalah Hak Milik Intelektual dari pemilik yang sah, kecuali hal tersebut dinyatakan lain dalam syarat dan ketentuan ini.Tidak satupun ketentuan dalam syarat dan ketentuan yang dapat ditafsirkan, diterjemahkan atau diartikan sebagai penyerahan dengan syarat atau tanpa syarat terhadap Hak Cipta, Paten dan Merek atau hak-hak lainnya dari ReadMe Shop atau pihak ketiga manapun.</p>
                <h2>TAUTAN TERHADAP LINK WEB LAIN</h2>
                <p class="justify">Untuk memberikan kelengkapan dan meningkatkan layanan terhadap kepada pengguna atas website ReadMe Shop, dalam website ReadMe Shop dicantumkan beberapa link alamat-alamat website yang terkait. Website-website ini merupakan milik dan dioperasikan oleh pihak ketiga. Website-website tersebut tidak mewakili kepentingan ReadMe Shop dan ReadMe Shop tidak bertanggung jawab atas keberadaan materi/konten yang terdapat dalam website pihak ketiga. Tautan atas alamat website pihak ketiga, tidak menunjukkan atau tidak dapat ditafsirkan adanya keterkaitan atau dukungan dari ReadMe Shop atau hubungan afiliasi apapun.</p>
                <h2>DISCLAIMER (PELEPASAN TANGGUNG JAWAB)</h2>
                <p class="justify">ReadMe Shop menyediakan kepada pengguna data dan informasi yang bermanfaat, akurat dan terbaru. Terkait dengan penyediaan data dan informasi tersebut, ReadMe Shop tidak bertanggung jawab atas akurasi dan kelengkapan atas data dan informasi tersebut. ReadMe Shop berhak dari  kewaktu untuk merubah materi atas setiap informasi dan data yang tersedia di website ini atau spesifikasi atas produk tanpa pemberitahuan terlebih dahulu. Tetapi up date atas materi informasi dan data bukan merupakan kewajiban bagi ReadMe Shop, sehingga ada kemungkinan materi pada website ini tidak up to date, termasuk yang tidak wajib adalah informasi yang terdapat pada buletin dan forum. ReadMe Shop, dan atau pegawainya, direksi, agen-agen, distributor atau afiliasinya tidak bertanggung jawab atas setiap kerugian langsung maupun tidak langsung, tuntutan/gugatan (baik yang timbul atau akan timbul di kemudian hari) atau kecelakaan yang timbul akibat informasi atau data yang terposting/dimuat dalam Website ReadMe Shop.ReadMe Shop memiliki hak penuh dari waktu kewaktu untuk melakukan revisi atas syarat dan ketentuan ini.<br><br>ReadMe Shop tidak bertanggung jawab dan dilepaskan dari tanggung jawab atas seluruh materi, informasi dan data, jaminan-jaminan termasuk tetapi tidak terbatas pada jaminan atas produk (baik dinyatakan secara jelas maupun tidak)  yang disajikan oleh pada website ini, termasuk atas segala kerugian dalam bentuk dan jenis apapun yang timbul akibat pengunaan atas materi, informasi dan data serta jaminan-jaminan yang ditayangkan dalam website ini.
                </p>
                <h2>HUKUM YANG BERLAKU</h2>
                <p class="justify">Syarat dan Ketentuan ini tunduk dan patuh kepada hukum Republik Indonesia dan hukum-hukum Internasional lainnya yang telah diratifikasi oleh Republik Indonesia. Segala permasalahan yang timbul akan diselesaikan berpedoman kepada hukum Republik Indonesia.</p>
                <h2>KETENTUAN UMUM</h2>
                <p class="justify">Apabila ada ketentuan dalam syarat dan kondisi ini batal, tidak sah atau tidak dapat dilaksanakan karena alasan apapun, ketentuan tersebut akan dihapus dari syarat dan ketentuan ini. Ketentuan-ketentuan yang lain dalam syarat dan ketetentuan ini akan tetap berlaku. </p>
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
