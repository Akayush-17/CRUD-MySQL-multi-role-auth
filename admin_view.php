<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


include('db_conn.php');


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
$customer1_id = 1;
$customer2_id = 2;

$query = "SELECT SUM(quantity) AS customer1_quantity, SUM(weight) AS customer1_weight, SUM(bcount) AS customer1_bcount FROM customer WHERE username = 'customer1'";
$result_customer1 = mysqli_query($conn, $query);
$row_customer1 = mysqli_fetch_assoc($result_customer1);

$query = "SELECT SUM(quantity) AS customer2_quantity, SUM(weight) AS customer2_weight, SUM(bcount) AS customer2_bcount FROM customer WHERE username = 'customer2'";
$result_customer2 = mysqli_query($conn, $query);
$row_customer2 = mysqli_fetch_assoc($result_customer2);

$total_quantity = $row_customer1['customer1_quantity'] + $row_customer2['customer2_quantity'];
$total_weight = $row_customer1['customer1_weight'] + $row_customer2['customer2_weight'];
$total_bcount = $row_customer1['customer1_bcount'] + $row_customer2['customer2_bcount'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }
        
        .table {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .heading{
            background-color: #333333;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin View</h2>
        <table class="table">
            <thead class="heading">
                <tr>
                    <th>Item/Customer</th>
                    <th>Customer1</th>
                    <th>Customer2</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Quantity</td>
                    <td><?php echo $row_customer1['customer1_quantity']; ?></td>
                    <td><?php echo $row_customer2['customer2_quantity']; ?></td>
                    <td><?php echo $total_quantity; ?></td>
                </tr>
                <tr>
                    <td>Weight</td>
                    <td><?php echo $row_customer1['customer1_weight']; ?></td>
                    <td><?php echo $row_customer2['customer2_weight']; ?></td>
                    <td><?php echo $total_weight; ?></td>
                </tr>
                <tr>
                    <td>Box Count</td>
                    <td><?php echo $row_customer1['customer1_bcount']; ?></td>
                    <td><?php echo $row_customer2['customer2_bcount']; ?></td>
                    <td><?php echo $total_bcount; ?></td>
                </tr>
            </tbody>
        </table>
        <a href="logout.php" class="btn btn-dark">Logout</a>
    </div>
</body>
</html>
