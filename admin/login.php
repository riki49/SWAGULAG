<?php
$mysqli = mysqli_connect("127.0.0.1", "root", "", "uas");

if(!$mysqli) {
    die();
}

if (!empty($_POST['username'])
  && !empty($_POST['password'])) {
    $sql = "SELECT * FROM Admin";
    $result = mysqli_query($mysqli, $sql);
    $admin = mysqli_fetch_assoc($result);
    if($_POST['username'] == $admin['username']
      && $_POST['password'] == $admin['password']) {
        session_start();
        $_SESSION['login'] = 1;
        header('Location: http://localhost/riki_mustofa_uas/admin/profile.php');
      }

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Admin</title>
  </head>
  <body>
    <form  method="POST" action="">
      <p>Username : <input type="text" name="username"></p>
      <p>Password :  <input type="password" name="password"></p>
      <input type="submit" name="name" value="Login">
    </form>
  </body>
</html>
