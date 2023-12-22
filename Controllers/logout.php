<?php

session_start();

unset($_SESSION['user']);
header('Location: ../Views/index.php');
exit();