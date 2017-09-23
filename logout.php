<?php
session_start();


if (isset($_SESSION['acrefin_user'])) {

unset($_SESSION['acrefin_user']);
unset($_SESSION['userType']);
unset($_SESSION['ca_id']);


$_SESSION=array();
}

header('Location: index.php');

?>