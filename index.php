<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tugas UAS</title>
    <!-- <base href="#" target="_blank" /> -->
    <link rel="stylesheet" href="beranda.css" media="screen" title="no title" charset="utf-8">
  </head>
<body>
  <!-- alert -->
  <script>
    window.alert("selamat datang di web saya :)");
  </script>
  <!-- logo -->
  <div class="logo1">
    <img  src="image/5.png" alt="logo" class="logo"/>
    <header class="header">GULAG</header>
  </div>

  <!-- menu bar -->
  <div class="menu-wrap">
  <ul>
		<li id="beranda"><a href="#beranda">Beranda</a></li>
		<li><a href="about.php">Tentang Kami</a></li>
		<li><a>Kontak Kami</a>
      <ul>
				<a href="#contact">kontak</a>
				<a href="#alamat">alamat</a>
			</ul>
		</li>
    <li><a href="admin/login.php">Admin</a></li>
	</ul>
  </div>
  <!-- bagian moto -->
  <p class="moto">don't  think live hard, before go to GULAG!!!</p>

  <!-- content -->
  <div class="content">
      <span class="kiri"><img src="image/6.jpg" alt="bodo" class="gamar" /></span>
      <span class="tengah">
      <span><img src="image/kawung.png" alt="" id="img1"/></span>
      <span><img src="image/hard.jpg" alt="" id="img2"/></span>
      <span><img src="image/9.jpg" alt="" id="img3"/></span>
      <span><img src="image/10.jpg" alt="" id="img4"/></span>
      <img src="image/cetak.gif" alt="" id="img6" />
      <img src="image/olah.jpg" alt="" id="img5" />
      <p class="judul_img"><b>Proses untuk mendapatkan manisnya gula</b></p>
    </span>
    <span class="kanan"><img src="image/viv.jpg" alt="" id="img7" /></span>
  </div>
    <div class="alamat">
      <p id="alamat"><b>Alamat</b></p>
      tempat : Cisewu - Garut <br>
      jalan : purwabhakti no 24<br>
    </div>
    <div class="contact">
      <br><br><br>
      <p id="contact"><b>kontak kami</b></p>
      <ul>
        <?php
        require_once 'func.php';
        $mysqli = mysqli_connect("127.0.0.1", "root", "", "uas");
        $sql = "SELECT * FROM Admin";
        $result = mysqli_query($mysqli, $sql);
        $admin = mysqli_fetch_assoc($result);
        if ($_POST) {
        function update_pesan($mysqli, $sql, $subjek, $pesan) {
          mysqli_query($mysqli, "INSERT INTO pesan (subjek , pesan)  VALUES ('$subjek', '$pesan');");
        }
        $subjek = $_POST['subjek'];
        $pesan = $_POST['pesan'];
        update_pesan($mysqli, $sql, $subjek, $pesan);
      }
        ?>
        <p>Profil Admin</p>
        <img src="admin/<?php echo $admin['image'] ?>" alt="admin" /> </br>
        <?php echo $admin['fullname']. '</br>';?>
        <li>telpon : 085721402154</li>
        <li>email : <a target="_blank" href="mailto:rikimustofa49@gmail.com"><?php echo $admin['email'] ?></a></li>
        <li>fb: <a target="_blank" href="https://www.facebook.com/ricky.mustofaaji?ref=ts&fref=ts">riki mustofa aji</a> </li>
        <li>github : <a target="_blank" href="https://www.github.com/riki49">https://www.github.com/riki49</a></li>
      </ul></br></br>

      <p>Pemesanan</p>
      <form method="post" enctype="multipart/form-data">
        <?php $sql = "INSERT INTO pesan"; ?>
        <p>Subjek : <input type="text" name="subjek"></p>
        <p>Pesan  : <textarea name="pesan" rows="8" cols="40"></textarea></p>
        <input type="submit" name="name" value="kirim">
      </form>
      <p><a href="#beranda"><br><br><br>paling atas</a></p>
    </div>
  </div>
  <div id="footer"><p>Copyright &copy; 2016 - All Rights Reserved</p></div>
</body>
</html>
