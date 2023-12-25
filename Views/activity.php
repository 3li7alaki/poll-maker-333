<?php

require '../Controllers/dependencies.php';
require '../Controllers/loggedIn.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poll Maker</title>
    <link rel="stylesheet" href="../Stylesheets/activity.css">
    <link rel="stylesheet" href="../Stylesheets/navbar.css">
    <link rel="icon" href="../Images/favicon.ico" type="image/x-icon">
    <script src="../Scripts/index.js"></script>
</head>
<body>
<?php
require '../Templates/navbar.php';
$user = $_SESSION['user'];
$polls = $user->votedPolls();
echo "<div class='container'>";
echo "<div class='header'>";
echo "<h1 class='title'>Activity</h1>";
echo "</div>";
echo "<main>";
foreach ($polls as $poll) {
    echo "<div class='poll' ondblclick='viewPoll(this)' id='$poll->id'>";
    echo "<h2 class='title'>" . $poll->title . "</h2>";
    echo "<h3 class='category'>" . $poll->category . "</h3>";
    $vote = $user->voteDetails($poll->id);
    $option = $user->getVote($poll->id);
    echo "<p class='stats'>" . $option->option_text . "</p>";
    echo "<p class='expiry'>" . $vote->vote_date . "</p>";
    echo "</div>";
}
echo "</main>";
echo "</div>";
?>
</body>
</html>