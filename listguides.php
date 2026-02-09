<?php
session_start();
include 'connectdb.php';
$logged_in = $_SESSION['logged_in'] ?? false;
$role = $_SESSION['role'] ?? '';

// Search functionality
$news = [];
if(isset($_POST['submit'])){
    $search = $_POST['search'];
    
    // Prepared statement for safer search
    $stmt = $conn->prepare("SELECT * FROM guides WHERE title LIKE ? ORDER BY time_created DESC");
    $searchTerm = "%$search%"; 
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
}

// If no search performed, fetch all articles
if (empty($news)) {
    $stmt = $conn->prepare("SELECT * FROM guides ORDER BY time_created DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Guides</title>
    <link rel="stylesheet" href="listnews.css">
    <link rel="stylesheet" href="main.css">
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
<h1 class="title"><u>All Guides</u></h1>
<br>
<p class="welcome-message"> This page contains Latest Guides regarding Football Manager, <br> written by our lovely Admins! <br> Enjoy <b>Managers! </b> </p>
<?php
if($role === 'admin'){
    echo '<a href="guides_upload.php" class="btn">Create Guide</a>'; 
}
?>
<br> <br>
<br>
    <div class="search-button">
        <form method='POST'>
            <input type="text" class="search-btn" placeholder="Search for a guide or author" name="search">
            <button name="submit">Search</button>
        </form>
    </div>

    <div class="posts-container">
        <?php
        // Display posts
        if (!empty($news)) {
            foreach ($news as $row) {
                echo '<section class="newsCard">';
                  if (!empty($row['picture'])) {
                    echo '<img src="' . htmlspecialchars($row['picture']) . '" alt="Guide image" class="listnews-article-image">' . '<br>';
                }
                echo '<p><a class=article-title href="retrieve_guides.php?id=' . htmlspecialchars($row['id']) . '">' .  '<b>', htmlspecialchars($row['title']) . '</b>' , '</a></p>';

                if($role === 'admin'){
                    echo '<p>
                        <a class=btn href="edit_news.php?id=' . htmlspecialchars($row['id']) . '">Edit</a> |
                        <a class=btn onclick="return confirm(\'Do You Really Want To Delete This?\')" href="delete_news.php?id=' . htmlspecialchars($row['id']) . '">Delete</a>
                    </p>';
                }

                echo '<p>Description: ' . htmlspecialchars($row['description']) . '</p>';
                echo '<p>Article written: ' . htmlspecialchars($row['time_created']) . '</p>';
                echo '</section>';
            }
        } else {
            echo "<p>No guides found.</p>";
        }
        ?>
    </div>
</body>
</html>
