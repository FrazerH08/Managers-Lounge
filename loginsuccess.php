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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="nav.js" defer></script>

</head>
<body>
    <header class="header">
        <div class="header_content">
            <a href="index.html" class="logo">Managers Lounge</a>
            <nav class="nav">
                <ul class="nav_list">
                    <li class="nav_item"> <a href="listnews.php" class="nav_link">News</a></li>
                    <li class="nav_item"> <a href="listguides.php" class="nav_link">Guides</a></li>
                    <li class="nav_item"> <a href="discussionboard.php" class="nav_link">Discussion Board</a></li>
                    <li class="nav_item" id="login"> <a href="login.php" class="nav_link">Login</a></li>
                    <li class="nav_item"> <a href="signup.php" class="nav_link">Sign up</a></li>
                    <li class="nav_item"> <a href="feedback.php" class="nav_link">Feedback</a></li>
                </ul>
            </nav>
            <div class="hamburger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </header>
<h1 class="title">Login</h1>
<div class="success-message">
<h2>Welcome <?php echo htmlspecialchars($username); ?>, <br> <br> Your login was successful <br> <br> Enjoy the features you now have being a member! </h2> 
    <?php
    if($role === 'admin'){
        echo " As You are an admin you can delete news, edit news and post articles and same with guides , here is the links to do so " ?> <br> <a class='content-creatorbtn' href="admin_management.php">Admin Management</a><br> <br> <br> <br> <br> <br> <?php
    }?>
</div>
<br> <br> <a class='btn' href="index.html">Home</a>
    <footer>
        <div class="f-container">
            <div class="footer-content">
                <h3>Contact Us</h3>
                <p>Email: citizensroadtosurvival@gmail.com</p>
            </div>
            <div class="footer-content">
                <h3> Quick links</h3>
                <ul class="f-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                </ul>
            </div>
            <div class="footer-content">
                <h3>Follow Us</h3>
                <ul class="social-icons">
                    <li><a href="https://x.com/Citizens_RoadTS"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/citizensroadtosurvival/"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="bottom-bar">
            <p>This is a fictional student website.</p>
        </div>
    </footer>
</body>
</html>