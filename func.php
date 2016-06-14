<?php
function redirectTo($url) {
  echo "<script>
    window.location.href='$url';
  </script>";
}
