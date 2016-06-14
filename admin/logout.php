<?php
require_once '../func.php';
session_start();
session_destroy();

redirectTo('http://localhost/riki_mustofa_uas/admin/login.php');
