<?php

require '../Controllers/dependencies.php';
require '../Controllers/loggedIn.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="../Stylesheets/profile.css">
    <link rel="stylesheet" href="../Stylesheets/navbar.css">
    <script src="../Scripts/validate.js"></script>
    <link rel="icon" href="../Images/favicon.ico" type="image/x-icon">
</head>
<body>
<?php
require '../Templates/navbar.php';
$user = $_SESSION['user'];
$pollsMade = count($user->polls());
$pollsVoted = count($user->votedPolls());
$votesReceived = 0;

foreach ($user->polls() as $poll) {
    $votesReceived += $poll->votes();
}

echo "<div class='container'>";
echo "<div class='profile'>";
echo "<div class='info'>";
echo "<h2>My Profile</h2>";
echo "<form action='../Controllers/updateProfile.php' method='post'>";
echo "<label for='name'>Name:</label><input name='name' type='text' id='name' placeholder='Change Your Name' value='$user->name'>";
echo "<label for='email'>Email:</label><input disabled name='email' type='text' id='email' value='$user->email'>";
echo "<label for='password'>New Password:</label><input name='password' type='password' id='password' placeholder='Change Your Password' oninput='validateForm(`profile`)'>";
echo "            <ul id='passwordRules'>
                <li id='length'>At least 8 characters</li>
                <li id='upper'>At least one uppercase letter</li>
                <li id='lower'>At least one lowercase letter</li>
                <li id='number'>At least one number</li>
                <li id='special'>At least one special character</li>
            </ul>";
echo "<label for='confirmPassword'>Confirm Password:</label><input name='confirmPassword' type='password' id='confirmPassword' placeholder='Confirm Your Password' oninput='validateForm(`profile`)'>";
echo "<label for='showPassword'>Show Password:<input type='checkbox' id='showPassword' onchange='show()'></label>";
echo "<input id='submit' type='submit' value='Update Profile' disabled>";
echo "</form>";
echo "</div>";
echo "<div class='stats'>";
echo "<h2>My Stats</h2>";
echo "<p class='stat'>Polls Made: " . $pollsMade . "</p>";
echo "<p class='stat'>Votes Cast: " . $pollsVoted . "</p>";
echo "<p class='stat'>Votes Received: " . $votesReceived . "</p>";
echo "</div>";
echo "</div>";
?>
</body>
</html>
