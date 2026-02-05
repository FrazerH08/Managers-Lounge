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
</head>
<body>
<nav>
        <ul>
            <li>
                <h1><a href="index.html">Managers Lounge</a></h1>
            </li>
            <li>
                <h2><a href="index.html">Latest News</a></li>
            </h2>
            <li>
                <h2><a href="index.html">Guides</a></li>
            </h2>
            <li>
                <h2><a href="index.html">Discussion Board</a></li>
            </h2>
            <li>
                <h2><a class="right-float" href="index.html">Login</a></li>
            </h2>
            <li>
                <h2><a class="right-float" href="index.html">Sign Up</a></li>
            </h2>
        </ul>
    </nav>
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
