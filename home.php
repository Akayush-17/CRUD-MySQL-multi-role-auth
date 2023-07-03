<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: index.php");
    exit();
}

include "db_conn.php";

if ($_SESSION['role'] === 'admin') {
    // Display admin view (admin_view.php)
    include "admin_view.php";
} elseif ($_SESSION['role'] === 'customer1' || $_SESSION['role'] === 'customer2') {
    // Display data entry form (customer_form.php)
    include "customer_form.php";
} else {
    // Handle unknown roles or show appropriate error message
    echo "Unknown role.";
}
