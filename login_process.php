<?php
require_once 'DB.php';
require_once 'User.php';


$db = new DB('localhost', 'root', '', 'registration');
$user = new User($db);


if ( isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $loggedInUser = $user->login($email, $password);

    if ($loggedInUser) {
     
        session_start();
        $_SESSION['user'] = $loggedInUser;

 
        header("Location: dashboard.php");
        exit();
    } else {
       
        header("Location: login.php?error=1");
        exit();
    }
}
?>
