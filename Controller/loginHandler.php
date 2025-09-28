<?php
session_start();
require_once '../Model/connection.php';

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username)) {
        $errors[] = 'Username is required';
    }

    if (empty($password)) {
        $errors[] = 'Password is required';
    }

    if (empty($errors)) {
        // Check when user or admin
        if ($username === 'admin' && $password === 'admin@123') {
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = true;
            header('Location: ../View/admin/adminBooks.php'); 
            exit;
        }

        $stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if ($stmt->num_rows > 0) {
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['is_admin'] = false;
                header('Location: ../View/user/index.php');  
                exit;
            } else {
                $errors[] = 'Invalid password';
            }
        } else {
            $errors[] = 'Invalid username';
        }

        $stmt->close();
    }
}

$conn->close();

if (!empty($errors)) {
    echo "<script>";
    echo "var errorMessages = " . json_encode($errors) . ";";
    echo "errorMessages.forEach(function(message) { alert(message); });";
    echo "</script>";
}
?>
