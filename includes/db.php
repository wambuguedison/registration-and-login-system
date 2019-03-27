<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "enc_community";

$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (mysqli_connect_errno()) {
    echo "Couldn't connect to database due to ".mysqli_connect_error();
    die();
}

define ("BASEURL", $_SERVER['DOCUMENT_ROOT'].'/projects/enc/');
require_once BASEURL."/includes/functions.php";