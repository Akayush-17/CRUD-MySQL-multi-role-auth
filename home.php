<?php
    session_start();
    include "db_conn.php";
    if (isset($_SESSION['username']) && isset($_SESSION['id']))
    { ?>

    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Multi user login</title>
    <style>
       .container1 {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 100px;
    width:700px;
  
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
  }

  .form-container {
    max-width: 400px;
    width: 100%;
    
  }

  .form-group {
    margin-bottom: 15px;
 
  }

    </style>
      </head>
      <body>
          <div class="container d-flex justify-content-center align-items-center"
          style="min-height:100vh">
              <?php if ($_SESSION['role']=='admin'){?>
                            <div class="p-3">
                      <?php include 'php/customer.php';
                      if (mysqli_num_rows($res) > 0) {?>
      
                     
                      <h3 class="display-4 fs-1">Customer</h3>
                  <table class="table" style="width: 32rem;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">User Name</th>
                    <th scope="col">role</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $i =1; 
                    while ($rows = mysqli_fetch_assoc($res 
                    )) {?>
                  
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$rows['name']?></td>
                    <td><?=$rows['username']?></td>
                    <td><?=$rows['role']?></td>
                  </tr>
                  <?php $i++; }?>
                 
                </tbody>
              </table>
              <?php }?>
            </div>
      <?php  }else { ?>
        <div class="container1">
            <div class="form-container">
        <form action="#" method="POST">
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
          <textarea class="form-control" id="specification" name="spec" rows="3" required></textarea>
        </div>
          
       
          <div class="form-group">
            <label for="checklistQuantity">Checklist Quantity</label>
            <input type="text" class="form-control" id="checklistQuantity" name="cquality" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
      </div>
       
        
        <?php } ?>

      
    </div>
</body>
</html>
<?php
    if($_POST['submit'])
    {
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
    }
?>
<?php }else{
    header("Location: index.php");

} ?>