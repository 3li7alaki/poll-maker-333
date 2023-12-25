<nav>
    <div class="name">
    <?php
    if (isset($_SESSION['user'])) {
        echo '<h2>' . $_SESSION['user']->name . '</h2>';
    }
    ?>
    </div>
    <div class="buttons">
    <a href="index.php">Home</a>
    <a href="addPoll.php">Create a Poll</a>
    <?php
    if (isset($_SESSION['user'])){
        $admin = $_SESSION['user']->isAdmin();
        echo '<a href="profile.php">Profile</a>';
        echo '<a href="myPolls.php">My Polls</a>';
        echo '<a href="activity.php">Activity</a>';
        echo '<a href="../Controllers/logout.php">Logout</a>';
    } else {
        echo '<a href="login.php">Login</a>';
    }
    if (isset($admin) && $admin) {
        echo '<a href="admin.php">Admin</a>';
    }
    ?>
    </div>
</nav>