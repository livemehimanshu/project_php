<?php
session_start();
require_once 'DB.php';
require_once 'User.php';
if (!isset($_SESSION['user'])) {
  
    header("Location: login.php");
    exit();
}

$db = new DB('localhost', 'root', '', 'registration');
$user = new User($db);


$loggedInUser = $_SESSION['user'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Welcome, <?php echo $loggedInUser['name']; ?>!</h2>
        <h3>User Details:</h3>
        <ul>
            <li>Name: <?php echo $loggedInUser['name']; ?></li>
            <li>Address: <?php echo $loggedInUser['address']; ?></li>
            <li>Mobile Number: <?php echo $loggedInUser['mobile']; ?></li>
            <li>Email: <?php echo $loggedInUser['email']; ?></li>
            <li>Photo: <img src="<?php echo $loggedInUser['photo']; ?>" alt="User Photo" width="100"></li>
        </ul>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
