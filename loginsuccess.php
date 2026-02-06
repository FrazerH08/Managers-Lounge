<?php
include 'connectdb.php';
session_start();
$role = $_SESSION['role'] ?? '';

// Check if username is set in session (if they're actually logged in)
if (!isset($_SESSION['username'])) {
    echo "No username in session. Please log in.";
    header("Location: login.php");
    exit();
}

// Get username from session, with additional safety
$username = $_SESSION['username'] ?? 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Managers Lounge</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="welcome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <ul>
            <li>
                <h1><a href="index.html">Managers Lounge</a></h1>
            </li>
            <li>
                <h2><a href="listnews.php">Latest News</a></li>
            </h2>
            <li>
                <h2><a href="listguides.php">Guides</a></li>
            </h2>
            <li>
                <h2><a href="discussionboard.php">Discussion Board</a></li>
            </h2>
            <li>
                <h2><a class="right-float" href="login.php">Login</a></li>
            </h2>
            <li>
                <h2><a class="right-float" href="signup.php">Sign Up</a></li>
            </h2>
        </ul>
    </nav>
<h1 class="title">Login</h1>
<div class="success-message">
<h2>Welcome <?php echo htmlspecialchars($username); ?>, <br> <br> Your login was successful <br> <br> Enjoy the features you now have being a member! </h2> 
    <?php
    if($role === 'admin'){
        echo " As You are an admin you can delete news, edit news and post articles and same with guides , here is the links to do so " ?> <br> <a class='content-creatorbtn' href="admin_management.php">Admin Management</a><br> <br> <br> <br> <br> <br> <?php
    }?>
</div>
<br> <br> <a class='btn' href="index.html">Home</a>
</body>
</html>