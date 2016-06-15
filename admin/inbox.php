<?php
require_once '../func.php';
session_start();
if (!$_SESSION) {
  redirectTo('http://localhost/riki_mustofa_uas/admin/login.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pesan Masuk</title>
    <link rel="stylesheet" href="inbox.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <p>Pesan Masuk</p>
    <?php
        $mysqli = mysqli_connect("127.0.0.1", "root", "", "uas");
        $sql = "SELECT * FROM pesan";
        $result = mysqli_query($mysqli, $sql);
    ?>
    <table style="width:100%">

      <tr>
        <td>
          <span class="id">id</span>
        </td>
        <td>
          <span class="subjek">Subjek</span>
        </td>
        <td>
          <span class="pesan">Pesan</span>
        </td>
      </tr>

      <?php while ($admin = mysqli_fetch_assoc($result)) : ?>
            <tr>
              <td><?php echo $admin['id'] ?></td>
              <td><?php echo $admin['subjek']?></td>
              <td><?php echo $admin['pesan']?></td>
            </tr>
      <?php endwhile ?>
    </table>
  </body>
</html>
