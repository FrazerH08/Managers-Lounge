<?php
include 'connectdb.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posting Reply</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="retrieve_news.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cambo&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="nav.js" defer></script>
</head>
<body>
    <?php
    $user_id = $_SESSION['user_id'];
    $guides_id = $_POST['guides_id'];
    $text = $_POST['text'];

    $sql = "INSERT INTO guides_comments (user_id, guides_id , text) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id , $guides_id, $text);
     if ($stmt->execute()) {
        header("Location: retrieve_guides.php?id=" . $guides_id); // redirect back to the article
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    ?>
</body>
</html>