<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="../Scripts/validate.js"></script>
    <link rel="stylesheet" href="../Stylesheets/auth.css">
    <link rel="icon" href="../Images/favicon.ico" type="image/x-icon">
</head>
<body>

<div class="container">
    <main>
        <h1>Login</h1>
        <form action="../Controllers/login.php" method="post">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" oninput="validateEmail(false)" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
            <label for="password">Password:<?php if (isset($error)) echo '<small> '.$error.'</small>'?></label>
            <input type="password" name="password" id="password" required oninput="validateEmail()">
            <input id="submit" type="submit" value="Login" disabled>
            <a href="register.html"><input id="register" type="button" value="Register"></a>
        </form>
    </main>
</div>
</body>
</html>
