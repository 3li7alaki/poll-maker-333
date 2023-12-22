<?php

require '../Controllers/dependencies.php';
require '../Controllers/loggedIn.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poll Maker</title>
    <link rel="stylesheet" href="../Stylesheets/index.css">
    <link rel="stylesheet" href="../Stylesheets/navbar.css">
    <link rel="icon" href="../Images/favicon.ico" type="image/x-icon">
    <script src="../Scripts/index.js"></script>
</head>
<body>
<?php
require '../Templates/navbar.php';
$user = $_SESSION['user'];
$polls = $user->polls();
echo "<div class='container'>";
echo "<div class='header'>";
echo "<h1 class='title'>My Polls</h1>";
echo "</div>";
echo "<main>";
foreach ($polls as $poll) {
    echo "<div class='poll' ondblclick='viewPoll(this)' id='$poll->id'>";
    echo "<h2 class='title'>" . $poll->title . "</h2>";
    echo "<h3 class='category'>" . $poll->category . "</h3>";
    $options = $poll->options();
    $votes = $poll->votes();
    echo "<p class='stats'>Total Votes: " . $votes . "</p>";
    $votes = $votes > 0 ? $votes : 1;
    foreach ($options as $option) {
        $optionVotes = $option->votes();
        $percent = round($optionVotes / $votes * 100);
        echo "<p>" . $option->option_text . "</p>";
        echo "<div>";
        echo "<div class='bar' style='width: " . $percent . "%'></div>";
        echo "<p class='stats'>" . $optionVotes. " votes, ". $percent . "%</p>";
        echo "</div>";
    }
    if ($poll->end_date) {
        echo "<p class='expiry''>Ends: " . $poll->end_date . "</p>";
    }
    echo "</div>";
}
echo "</main>";
echo "</div>";
?>
</body>
</html>