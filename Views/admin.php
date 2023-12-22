<?php

use Models\Poll;
use Models\User;

require '../Controllers/admin.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../Stylesheets/navbar.css">
    <link rel="stylesheet" href="../Stylesheets/admin.css">
    <link rel="icon" href="../Images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Scripts/index.js"></script>
</head>
<body>
<?php
require '../Templates/navbar.php';
?>
<div class="container">
    <h1>Admin Page</h1>
    <main>
        <div class="polls">
            <h2>Polls: <?= count(Poll::All()) ?></h2>
            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>End Date</th>
                    <th>Created By</th>
                    <th>Votes</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach (Poll::All() as $poll): ?>
                    <tr ondblclick="viewPoll(this)" id="<?= $poll->id ?>">
                        <td><?= $poll->title ?></td>
                        <td><?= $poll->category ?></td>
                        <td><?= $poll->end_date ?></td>
                        <td><?= $poll->user()->name ?></td>
                        <td><?= $poll->votes() ?></td>
                        <td><a href="../Controllers/deletePoll.php?id=<?= $poll->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="users">
            <h2>Users: <?= count(User::All()) ?></h2>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Polls</th>
                    <th>Votes Gathered</th>
                    <th>Votes Casted</th>
                    <th>Registered At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach (User::All() as $user): ?>
                    <tr>
                        <td><?= $user->name ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= count($user->polls()) ?></td>
                        <td><?php
                            $votes = 0;
                            foreach ($user->polls() as $poll) {
                                $votes += $poll->votes();
                            }
                            echo $votes;
                            ?></td>
                        <td><?= count($user->votedPolls()) ?></td>
                        <td><?= $user->time_created ?></td>
                        <td><a href="../Controllers/deleteUser.php?id=<?= $user->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
</html>