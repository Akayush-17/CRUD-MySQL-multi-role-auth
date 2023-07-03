<?php
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validate username and password here (e.g., check against the auth table)

    // Assuming authentication is successful for demo purposes
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    header("Location: home.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
