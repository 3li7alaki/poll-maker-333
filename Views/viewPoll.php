<?php

use Models\Poll;

require '../Controllers/dependencies.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../Stylesheets/viewPoll.css">
    <link rel="stylesheet" href="../Stylesheets/navbar.css">

</head>
<body>
    <?php
    require '../Templates/navbar.php';



    // $user = $_SESSION['user'];
        
    $poll_Id = $_GET['pollId'];
    $poll = Poll::find($poll_Id);

    echo "<div class='container'>";
    echo "<main>";

        echo "<div class='poll'>";
        echo "<h2 class='title'>" . $poll->title . "</h2>";
        echo "<h3 class='category'>" . $poll->category . "</h3>";
        echo "<form action='vote.php' method='post'>";
        echo "<input type='hidden' name='poll_id' value='" . $poll->id . "'>";
        $options = $poll->options();
        $votes = $poll->votes();
        echo "<p class='stats'>Total Votes: " . $votes . "</p>";
        $votes = $votes > 0 ? $votes : 1;
        foreach ($options as $option) {polls
            $optionVotes = $option->votes();
            $percent = round(($optionVotes) / ($votes) * 100);
        
            echo "<input type='radio' name='option_id' value='" . $option->id . "' o>" . $option->option_text . "<br>";
            echo "<div>";
            echo "<div class='bar' style='width: " . $percent . "%'></div>";
            echo "<p class='stats'>" . $optionVotes. " votes, ". $percent . "%</p>";
            
            echo "</div>";
        }
        echo "<input type='submit' value='vote'/>";
        echo "</form>";
        if ($poll->end_date) {
            echo "<p class='expiry''>Ends: " . $poll->end_date . "</p>";
        }
        
        echo "</div>";
        echo "</main>";
        echo "</div>";
    
    ?>
</body>
</html>