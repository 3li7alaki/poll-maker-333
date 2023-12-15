<?php

session_start();

unset($_SESSION['user']);
header('Location: ../Views/Index.php');
exit();