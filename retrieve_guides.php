<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Article</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="retrieve_news.css">
    <link rel="stylesheet" href="feedback.css">
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
<?php
include 'connectdb.php';
session_start();
$guides_id = $_GET['id'];

$sql = "SELECT title, description, content, picture FROM guides WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $guides_id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
        if (!empty($row['picture'])) {
            echo "<h1>" . html_entity_decode($row['title']) . "</h1>";
            // If it's a file path
            if (file_exists($row['picture'])) {
                echo "<img src='" . htmlspecialchars($row['picture']) . "' alt='Post Image'>";
            }
            // If it's base64 encoded
            else if (strpos($row['picture'], 'base64') !== false) {
                echo "<img src='" . $row['picture'] . "' alt='Post Image'>";
            }
            // If it's binary data
            else {
                echo "<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' alt='Post Image'>";
            }
        }
        echo '<section class="postCard2">';

        echo "<h3>" . html_entity_decode($row['description']) . "</h3>";
        echo "<p>" . html_entity_decode($row['content']) . "</p>";
        // Check if picture exists and is not null
        echo '</section>';
    }
} else {
    echo "Sorry, 0 Results Returned";
}


?>

<?php
if (isset($_SESSION['user_id'])){
    echo '
    <section class="comment-form">
        <form method="POST" action="post_guides_comments.php">
            <textarea name="text" placeholder="What would you like to comment..." required></textarea><br>
            <input type="hidden" name="guides_id" value="'. htmlspecialchars($guides_id) . '">
            <button class=btn type="submit">Post Comment</button>
        </form>
    </section>';
} else{
    echo '<p>Please <a href="login.php" class="btn">Log In</a> to comment </p>';
}

$commentQuery = "SELECT g.text, g.date_created, u.username 
                 FROM guides_comments g 
                 JOIN ml_users u ON g.user_id = u.id 
                 WHERE g.guides_id = ? 
                 ORDER BY g.date_created DESC";
$commentStmt = $conn->prepare($commentQuery);
$commentStmt->bind_param("i", $guides_id);
$commentStmt->execute();
$commentResult = $commentStmt->get_result();

echo '<section class="comments">';
echo '<h3>Comments:</h3>';
while ($comment = $commentResult->fetch_assoc()) {
    echo "<div class='comment-box'>";
    echo "<strong>" . htmlspecialchars($comment['username']) . "</strong><br>";
    echo "<p>" . nl2br(htmlspecialchars($comment['text'])) . "</p>";
    echo "<small>". date("F j, Y, g:i a", strtotime($comment['date_created'])) . "</small>";
    echo "</div><hr>";
}
echo '</section>';
$stmt->close();
$conn->close();
?>
        <footer>
        <div class="f-container">
            <div class="footer-content">
                <h3>Contact Us</h3>
                <p>Email: citizensroadtosurvival@gmail.com</p>
            </div>
            <div class="footer-content">
                <h3> Quick links</h3>
                <ul class="f-list">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="listnews.php">News</a></li>
                    <li><a href="listguides.php">Guides</a></li>
                    <li><a href="discussionboard.php">Discussion Board</a></li>
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
            <p>This is a student website.</p>
        </div>
    </footer>
</body>
</html>
<?php
