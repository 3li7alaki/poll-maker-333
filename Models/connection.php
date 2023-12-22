<?php

$db = new PDO('mysql:host=localhost;dbname=pollmaker', 'u515027391_admin', 'Pollmaker@123');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);