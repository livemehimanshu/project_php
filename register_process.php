<?php
require_once 'DB.php';
require_once 'User.php';


$db = new DB('localhost', 'root', '', 'registration');
$user = new User($db);
if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $photo = $_FILES["photo"];

    $user->register($name, $email,$password ,$mobile  , $address, $photo);

    header("Location: login.php");
    exit();
}
?>
