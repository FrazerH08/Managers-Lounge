<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="signup.css">
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
  <h1 class="title"><u>Sign Up</u></h1>
<form action="accountvalidation.php" method='POST'>
        <p> Please fill out this form to sign up </p>

        <label for="firstname"><b>First name:</b></label>
        <input type="text" class="box"placeholder="Enter First Name"name="firstname"required> <br>
        <br>

        <label for="lastname"><b>Lastname:</b></label>
        <input type="text" class="box" placeholder="Enter last Name"name="lastname"required> <br>
        <br>
        <label for="dob"><b>Date of birth:</b></label>
        <input type="date" class="box" id="birthdate"name="birthdate"> <br>
        <br>
        <br>
        <label for="email"><b>Email:</b></label>
        <input type="text" class="box" placeholder="Enter Email" name="email" required> <br>
        <br> <label for="username"><b>Username:</b></label>
        <input type="text" class="box" placeholder="Enter Username" name="username" required> <br>
        <br> <label for="password"><b>Password:</b></label>
        <input type="password" class="box" placeholder="Enter Password" name="password" required>

        <label>
      <br> <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <div class="next">
            <button type="submit" name= "submit" value="submit" class="signupbtn" >Submit</button>
        </div>
        <p> Already have an account? <a href="login.php"> Log in now</a></p>
    </form>
</body>
</html>
