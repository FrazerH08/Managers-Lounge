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
    <script src="nav.js" defer></script>
</head>
<body>
<nav>
        <ul>
            <li>
                <h1><a href="index.html">Managers Lounge</a></h1>
            </li>
            <li>
                <h2><a href="listnews.php">Latest News</a></li></h2>
            <li>
                <h2><a href="listguides.php">Guides</a></li></h2>
            <li>
                <h2><a href="discussionboard.php">Discussion Board</a></li></h2>
            <li>
                <h2><a class="right-float" href="login.php">Login</a></li></h2>
            <li>
                <h2><a class="right-float" href="signup.php">Sign Up</a></li></h2>
        </ul>
    </nav>
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
                 JOIN users u ON g.user_id = u.id 
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
    echo "<small>" . $comment['date_created'] . "</small>";
    echo "</div><hr>";
}
echo '</section>';
$stmt->close();
$conn->close();
?>
</body>
</html>
<?php
