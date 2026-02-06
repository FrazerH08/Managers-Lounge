<?php
include 'connectdb.php';
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Validation</title>
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
    <?php
// if form is submitted
if(!isset($_POST['submit'])){
    header("Location: signup.php");
    exit();
}

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];


// email check
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<h1 class='title'>Invalid email format</h1>");
}

// Validate username
if (strlen($username) < 3 || strlen($username) > 20) {
    die("<h1 class='title'>Username must be between 3 and 20 characters</h1>");
}

// Additional username validation (only alphanumeric)
if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
    die(" <h1 class='title'>Username can only contain letters, numbers, and underscores</h1>");
}

// Password check 
if (strlen($password) < 8) {
    die(" <h1 class='title'> Password must be at least 8 characters long</h1>");
}

        // Check if email already exists
        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            echo "<h1 class='title'>Email is already taken, please change email</h1><br>";
            echo "<div class='accvalid'><a href='javascript:self.history.back()' class='btn'> Go Back</a></div>";
        } else {
            // Hash the password , incase it gets hacked, based on testscript file
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user into db
            $insert_stmt = $conn->prepare("INSERT INTO users (username, email, password, firstname, lastname, birthdate ) VALUES (?, ?, ?, ?, ?, ?)");
            $insert_stmt->bind_param("ssssss", $username, $email, $hashed_password, $firstname, $lastname, $birthdate );

            if($insert_stmt->execute()){
                echo "<h1 class='title'>Registration was successful</h1><br>";
                echo "<div class='accvalid'><a href='login.php' class='btn'>Login</a></div>";
            } else {
                echo "<h1 class='title'>Registration failed</h1><br>";
                echo "Error: " . $insert_stmt->error;
            }
        }
        ?>

</body>
</html>
