<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to BloxEra!</title>
    <link rel="stylesheet" href="signstyle.css">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <center>
        <img class="logo" src="/imgs/logo.svg" width="200">
        <h1>Join tens of builders</h1>
        <h2>and explore their creations</h2>
    </center>
    <div class="centered">
        <div class="left">
            <img src="/imgs/item.jpg">
            <center><h3>What will you build?</h3></center>
        </div>
        <div class="box">
            <a class="active" href="/signup.php"><b>Sign up </b></a><a class="inactive" href="/login.php">| Login</a>
            <form action="adduser.php" method="POST" onsubmit="return validatePassword()">
                <p class="titl">Birthday</p>
                <select name="month" required>
                    <option value="">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="day" required>
                    <option value="">Day</option>
                    <?php for ($i = 1; $i <= 31; $i++) echo "<option value='$i'>$i</option>"; ?>
                </select>
                <select name="year" required>
                    <option value="">Year</option>
                    <?php for ($i = 1915; $i <= 2014; $i++) echo "<option value='$i'>$i</option>"; ?>
                </select>
                <p class="titl">Gender</p>
                <input type="radio" name="gender" value="Male" required> Male
                <input type="radio" name="gender" value="Female"> Female
                
                <p class="titl">Username</p>
                <input class="textbox" type="text" id="username" name="username" pattern="[A-Za-z0-9]{3,20}" required>
                <br><small>3-20 alphanumeric characters, no spaces</small>
                
                <p class="titl">Password</p>
                <input class="textbox" type="password" id="password" name="password" pattern="(?=.*[A-Za-z]{4,})(?=.*\d{2,}).{6,20}" required>
                <br><small>6-20 characters, minimum of 4 letters & 2 numbers</small>
                
                <p class="titl">Confirm Password</p>
                <input class="textbox" type="password" id="confirm_password" name="confirm_password" required>
                
                <br><br>
                <input class="signbutton" type="submit" value="Sign Up">
            </form>
        </div>
    </div>
</body>
</html>