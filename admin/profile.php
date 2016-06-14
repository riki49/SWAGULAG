
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
  </head>
  <body>
    <!-- pemanggilan/import -->
    <?php
        require_once '../func.php';
        // require_once '../config.php';

        session_start();
        if(empty($_SESSION['login']))
          redirectTo('http://localhost/riki_mustofa_uas/admin/login.php');
    // connect database
        $mysqli = mysqli_connect("127.0.0.1", "root", "", "uas");
        $sql = "SELECT * FROM Admin";
        $result = mysqli_query($mysqli, $sql);
        $admin = mysqli_fetch_assoc($result);

          function update_admin($field, $value) {
            global $mysqli;
            mysqli_query($mysqli, "UPDATE admin SET $field = '$value' WHERE id=1;");
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          if ($_FILES['avatar']['name'] == '')
              echo "<script> window.alert('tentukan perubahan anda');</script>";
          else {
            redirectTo('http://localhost/riki_mustofa_uas/admin/profile.php');
            $new_image = $_FILES['avatar']['name'];
            $new_username = $_POST['username'];
            $new_password = $_POST['password'];
            $new_fullname = $_POST['fullname'];
            $new_email = $_POST['email'];
            update_admin('image', $new_image);
            update_admin('username', $new_username);
            update_admin('password', $new_password);
            update_admin('fullname', $new_fullname);
            update_admin('email', $new_email);
            move_uploaded_file ( $_FILES['avatar']['tmp_name'],  $new_image);
        }
      }

    ?>
    <p>Profil Admin</p>
    <span><a href="../beranda.php">beranda</a></span>
    <span><a href="logout.php">logout</a></span> </br>
    <img src="<?php echo $admin['image']?>" alt="" />
    <form method="post" action="" enctype="multipart/form-data">
      <input type="file" name="avatar">
      <p>username : <input type="text" name="username" value="<?php echo $admin['username']?>"></p>
      <p>password : <input type="password" name="password" value="<?php echo $admin['password']?>"></p>
      <p>fullname : <input type="text" name="fullname" value="<?php echo $admin['fullname']?>"></p>
      <p>email : <input type="text" name="email" value="<?php echo $admin['email']?>"></p>
      <input type="submit" name="update" value="update">
    </form>\
  </body>
</html>
