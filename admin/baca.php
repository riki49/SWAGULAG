<?php
require_once '../func.php';
session_start();
if (!$_SESSION) {
  redirectTo('http://localhost/riki_mustofa_uas/admin/login.php');
}
?>

<?php
$mysqli = mysqli_connect("127.0.0.1", "root", "", "uas");
$status = $_GET['id'];
mysqli_query($mysqli, "UPDATE pesan SET status='sudah dibaca' WHERE id='$status';");
$result = mysqli_query($mysqli, "SELECT * FROM pesan WHERE id='$status';");
$selected_pesan = mysqli_fetch_assoc($result);
?>
<table border="1px">
  <tr>
    <td height="27" align="left" valign="middle">subjek</td>
    <td height="27" align="left" valign="middle">Pesan</td>
  </tr>
  <tr>
    <td height="27" align="left" valign="middle"><?php echo $selected_pesan['subjek']?></td>
    <td height="27" align="left" valign="middle"><?php echo $selected_pesan['pesan']?></td>
  </tr>
</table>

<p><a href="inbox.php">kembali ke pesan masuk </a></p>
