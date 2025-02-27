<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff Login</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <section class="header">
        <nav>
            <a href="homePage.php"> <img src="image/logo1.png" alt="Logo"></a>
            <div class="nav-links">
                <ul>
                    <li> <a href="aboutUs.html">About Us</a></li>
                    <li> <a href="courses.html">Course</a></li>
                </ul>
            </div>
        </nav>

    <!-- Main Login Form Section -->
    <div class="login-section">
        <div class="form-container">
            <h2>Staff Login</h2>
            <form method="POST" action="loginStf.php">
                <label for="staffId">Staff ID:</label>
                <input type="text" id="staffId" name="staffId" placeholder="Enter your Staff ID" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <button type="submit" name="submit">Login</button>

                <p>Don't have an account? <a href="frmStfInfo.php">Sign Up</a></p>
            </form>
        </div>
    </div>
    </section>
</body>
</html>
