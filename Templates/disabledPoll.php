<?php

use Models\Poll;

$pollId = $_GET['pollId'];
$user = $_SESSION['user'];

$poll = Poll::find($pollId);
$vote = $user->getVote($pollId);

echo "<div class='poll'>";
echo "<h2 class='title'>" . $poll->title . "</h2>";
echo "<h3 class='category'>" . $poll->category . "</h3>";
echo "<p class='author'>By: " . $poll->user()->name . "</p>";
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
    if ($vote && $vote->id == $option->id)
        echo "<input id='$option->id' type='radio' name='option_id' value='" . $option->id . "' checked disabled>";
    else
        echo "<input id='$option->id' type='radio' name='option_id' value='" . $option->id . "' disabled>";
    echo "<label for='$option->id'>$option->option_text</label>";
    echo "<div class='bar' style='width: " . $percent . "%'></div>";
    echo "<p class='stats'>" . $optionVotes. " votes, ". $percent . "%</p>";
    echo "</div>";
}
echo "</form>";
if ($poll->end_date) {
    echo "<p class='expiry''>Ends: " . $poll->end_date . "</p>";
    if (strtotime($poll->end_date) < time() && $poll->user_id == $_SESSION['user']->id) {
        echo "<form action='../Controllers/deletePoll.php' method='post'>";
        echo "<input type='hidden' name='poll_id' value='" . $poll->id . "'>";
        echo "<div class='end'>";
        echo "<input id='end' type='submit' value='Delete poll'/>";
        echo "</div>";
        echo "</form>";
    }
} else if ($poll->user_id == $_SESSION['user']->id) {
    echo "<form action='../Controllers/endPoll.php' method='post'>";
    echo "<input type='hidden' name='poll_id' value='" . $poll->id . "'>";
    echo "<div class='end'>";
    echo "<input id='end' type='submit' value='End poll'/>";
    echo "</div>";
}

echo "</div>";