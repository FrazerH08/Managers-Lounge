<?php
    session_start();

    include 'connectdb.php';
    $id = $_GET['id'];

    $SQL = "SELECT title, description, content, picture FROM discussion_board WHERE id = $id";

    $result= $conn->query($SQL);
    $logged_in = $_SESSION['logged_in'];
    $role = $_SESSION['role'];
    if( $logged_in == false) {
        header(header:"Location: discussionboard.php");
    }
    $row = $result->fetch_assoc();

    if($result->num_rows == 0) {
        echo "No Thread Found!";
    }else{
        $title =  html_entity_decode($row['title']);
        $description =  html_entity_decode($row['description']);
        $content =  html_entity_decode($row['content']);
        $picture = $row['picture'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Thread </title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="edit_news.css">
    <link rel="stylesheet" href="feedback.css">
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
<h1><u>Edit Guides</u></h1>
<form action="edit_thread_validate.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <label for="title">Title: </label><br>
        <input type="text" name="title" id="title" value="<?php echo $title;?>" size="34">
        <br>
        <label for="description_txt">Description: </label><br>
        <textarea name="description" id="description_txt" cols="100" rows="10"><?php echo $description; ?></textarea><br>
        <label for="content">Content: </label><br>
        <textarea name="content" id="content" cols="180" rows="26"><?php echo $content; ?></textarea>
        <br>
        <button type="submit" class="btn" onclick="alert('Thanks for submitting!')">Submit</button>
        <label for="pictureup" class="btn">Choose Image </label>
        <input type="file" id="pictureup"name="fileToUpload">
    </form>
</body>
</html>
