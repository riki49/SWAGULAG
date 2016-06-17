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
    <p><a href="profile.php">kembali</a></p>
    <?php
      require_once '../func.php';
        $mysqli = mysqli_connect("127.0.0.1", "root", "", "uas");
        $sql = "SELECT * FROM pesan";
        $result = mysqli_query($mysqli, $sql);

        if($_POST){
          echo "ok";
          // mysqli_query($mysqli, "UPDATE admin SET status='sudah' WHERE id=$admin['id'];");
          redirectTo('http://localhost/riki_mustofa_uas/admin/inbox.php');
        }
    ?>
    <table style="width:100%" border="1px">
      <tr>
        <td height="27" align="center" valign="middle">
          id
        </td>
        <td height="27" align="center" valign="middle">
          Subjek
        </td>
        <td height="27" align="center" valign="middle">
          Pesan
        </td>
        <td height="27" align="center" valign="middle">
          Status
        </td>
      </tr>

      <?php while ($admin = mysqli_fetch_assoc($result)) : ?>
            <tr>
              <td height="27" align="left" valign="middle"><?php echo $admin['id'] ?></td>
              <td height="27" align="left" valign="middle"><?php echo $admin['subjek']?></td>
              <td height="27" align="left" valign="middle"><?php echo $admin['pesan']?></td>
              <td height="27" align="left" valign="middle"><?php if($admin['status'] == 'belum dibaca') {
                echo $admin['status'];
              } else {
                echo "sudah dibaca";
              }?></td>
              <td height="27" align="left" valign="middle"><a href="baca.php?id=<?php echo $admin['id'] ?>">baca</a></td>
            </tr>
      <?php endwhile ?>
    </table>
  </body>
</html>
