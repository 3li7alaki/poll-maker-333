<?php

use Models\Poll;

require '../Controllers/dependencies.php';
require '../Controllers/loggedIn.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../Views/Login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poll Maker</title>
    <link rel="stylesheet" href="../Stylesheets/addPoll.css">
    <link rel="stylesheet" href="../Stylesheets/navbar.css">
    <link rel="icon" href="../Images/favicon.ico" type="image/x-icon">
    <script src="../Scripts/poll.js"></script>
</head>
<body>
<?php
require '../Templates/navbar.php';
?>
<div class="container">
    <form method="post" action="../Controllers/addPoll.php">
    <main>
        <h1>Create a Poll</h1>
            <label for="title">Title:</label><input type="text" name="title" id="title" required>
            <label for="category">Category:</label><input type="text" name="category" id="category" list="categories" required>
            <label for="end_date">End Date: <small>Leave Empty to Manually End*</small></label><input type="datetime-local" name="end_date" id="end_date">
            <datalist id="categories">
                <?php
                    foreach (Poll::categories() as $category) {
                        echo '<option value="' . $category . '">';
                    }
                ?>
            </datalist>
        <input type="submit" value="Add Poll">

    </main>
            <main>
                <h2>Options</h2>
                <div id="options">
                <input type="text" name="options[]" placeholder="Option 1" required>
                <input type="text" name="options[]" placeholder="Option 2" required>
                </div>
                <button id="add" type="button" onclick="addOption()">Add Option</button>
            </main>
    </form>
</div>
</body>
</html>