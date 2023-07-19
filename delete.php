<?php
require 'users/users.php';

if (!isset($_POST['id'])) {
    echo 'User not found!';
    exit;
}

$userId = $_POST['id'];
$user = getUserById($userId);

if (!$user) {
    echo 'User not found!';
    exit;
}

deleteUser($userId);
header("Location: index.php");
?>