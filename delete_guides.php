<?php
include 'connectdb.php';
session_start();

$logged_in = $_SESSION['logged_in'];
$role = $_SESSION['role'];

if($role != 'admin' || $logged_in == false) {
    header(header:"Location: list_news.php");
}

$SQL = "DELETE FROM guides WHERE id =" . $_GET['id'];

$result = $conn->query(query:$SQL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Guides</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

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
    <?php
    echo '<style>
    section{
    background-color:pink;
    display:block;
    }
    </style>';
    
    if ($result === TRUE) {
        echo "<h1 class='title'>Article Deleted Successfully</h1>";
        echo "<p style='display:block; text-align:center;'>" . mysqli_affected_rows($conn) ." Rows Affected </p>";
        echo "<p style='display:block; text-align:center;'><a class=btn href='listguides.php'>Back To Guides</a></p>";
    } else {
        echo "Sorry 0 Results Returned";
    }
    ?>
</body>
</html>