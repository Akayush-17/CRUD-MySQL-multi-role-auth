<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include "db_conn.php";


// Check if the user is logged in as a customer
if ($_SESSION['role'] === 'customer1' || $_SESSION['role'] === 'customer2') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate and sanitize the form inputs
        $date = $_POST['date'];
        $company = $_POST['company'];
        $owner = $_POST['owner'];
        $items = $_POST['items'];
        $quantity = $_POST['quantity'];
        $weight = $_POST['weight'];
        $trackingid = $_POST['tracking'];
        $shipment = $_POST['shipment'];
        $shipmentsize = $_POST['ssize'];
        $bcount = $_POST['bcount'];
        $specification = $_POST['specification'];
        $cquantity = $_POST['cquantity'];
        $username = $_POST['username'];

        // Perform additional validation as per your requirements
        // ...

        // Insert the form data into the customer table
        $query = "INSERT INTO customer (date, company, owner, items, quantity, weight, trackingid, shipment, shipmentsize, bcount, specification, cquantity, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssssssss", $date, $company, $owner, $items, $quantity, $weight, $trackingid, $shipment, $shipmentsize, $bcount, $specification, $cquantity, $username);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Data inserted successfully
            echo "Data inserted successfully.";
        } else {
            // Failed to insert data
            echo "Failed to insert data.";
        }

        $stmt->close();
    }
} else {
    // Redirect to the login page if the user is not logged in as a customer
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
    <style>
    body {
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        .container1 {
            width: 500px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 100px;
            margin-bottom: 50px;
        }

  .form-container {
    max-width: 400px;
    width: 100%;
  
  }

  .form-group {
    margin-bottom: 5px;


 
  }
  .heading2{
    text-align: center;
  }

    </style>
</head>
<body>
    
<div class="container1">
            <div class="form-container">
        <form action="#" method="POST">
       
        <br>
            <h2 class="heading2">Customer Form</h2>   
        <div class="form-group ">
          <label for="orderDate">Order Date</label>
          <input type="date" class="form-control" id="orderDate" name="date" required>
        </div>
        <div class="form-group">
          <label for="company">Company</label>
          <input type="text" class="form-control" id="company" name="company" pattern="[a-zA-Z0-9]+" required>
        </div>
        <div class="form-group">
          <label for="owner">Owner</label>
          <input type="text" class="form-control" id="owner" name="owner" pattern="[a-zA-Z0-9]+" required>
        </div>
        <div class="form-group">
          <label for="items">Items</label>
          <input type="text" class="form-control" name="items" id="items" required>
        </div>
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" class="form-control" name="quantity" id="quantity" required>
        </div>
        <div class="form-group">
          <label for="weight">Weight</label>
          <input type="number" step="0.01" class="form-control" name="weight" id="weight" required>
        </div>
        <div class="form-group">
          <label for="request">Request for Shipment</label>
          <textarea class="form-control" id="request" rows="3" name="shipment" required></textarea>
        </div>
        <div class="form-group">
          <label for="trackingID">Tracking ID</label>
          <input type="text" class="form-control" name="tracking" id="trackingID" required>
        </div>
        <div class="form-group">
          <label for="shipmentSize">Shipment Size (L*B*H)</label>
          <input type="text" class="form-control" name="ssize" id="shipmentSize" required>
        </div>
        <div class="form-group">
          <label for="boxCount">Box Count</label>
          <input type="number" class="form-control" name="bcount" id="boxCount" required>
        </div>
        <div class="form-group">
          <label for="specification">Specification</label>
          <textarea class="form-control" id="specification" name="specification" rows="3" required></textarea>
        </div>
          
       
          <div class="form-group">
            <label for="checklistQuantity">Checklist Quantity</label>
            <input type="text" class="form-control" id="checklistQuantity" name="cquantity" required>
          </div>
          <div class="form-group ">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="" required>
        </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          <a href="logout.php" class="btn btn-dark">Logout</a>
        </form>
        </div>
      </div>

    
</body>
</html>



