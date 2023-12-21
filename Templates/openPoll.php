<?php

use Models\Poll;

$pollId = $_GET['pollId'];

$poll = Poll::find($pollId);

echo "<div class='poll'>";
echo "<h2 class='title'>" . $poll->title . "</h2>";
echo "<h3 class='category'>" . $poll->category . "</h3>";
echo "<form action='../Controllers/vote.php' method='post'>";
echo "<input type='hidden' name='poll_id' value='" . $poll->id . "'>";
$options = $poll->options();
$votes = $poll->votes();
echo "<p class='stats'>Total Votes: " . $votes . "</p>";
$votes = $votes > 0 ? $votes : 1;
foreach ($options as $option) {
    $optionVotes = $option->votes();
    $percent = round(($optionVotes) / ($votes) * 100);
    echo "<div class='option'>";
    echo "<input id='$option->id' type='radio' name='option_id' value='" . $option->id . "'>";
    echo "<label for='$option->id'>$option->option_text</label>";
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