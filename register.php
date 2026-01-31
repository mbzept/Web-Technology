<?php
include 'config.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO users (username, email, password)
                      VALUES (:u, :e, :p)");
$stmt->bindValue(':u', $username);
$stmt->bindValue(':e', $email);
$stmt->bindValue(':p', $password);

if ($stmt->execute()) {
    header("Location: login.php");
} else {
    echo "User already exists!";
}
?>
