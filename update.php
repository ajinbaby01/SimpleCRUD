<?php
require 'users/users.php';
include 'partials/header.php';

if (!isset($_GET['id'])) {
    echo 'User not found!';
    exit;
}

$userId = $_GET['id'];
$user = getUserById($userId);

if (!$user) {
    echo 'User not found!';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateUser($_POST, $userId);
    header("Location: index.php");
}
?>

<?php require 'form.php' ?>


<?php include 'partials/footer.php' ?>