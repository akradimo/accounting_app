<?php

require_once '../app/core/Database.php';

$db = new Database();
$conn = $db->connect();

echo 'Connected successfully';