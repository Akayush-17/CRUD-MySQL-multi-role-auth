
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Multi user login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center"
    style="min-height:100vh">
        <form class="border shadow p-3 rounded"
        style="width:450px"
        action="php/check-login.php"
        method="POST"
        >
        <h1 class="text-center p-3">LOGIN</h1>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
              <?=$_GET['error']?>
            </div>

        <?php } ?>

        
        
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User name</label>
            <input type="text" name="username" class="form-control" id="username" >
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" >
          </div>
          <div class="mb-1">
            <label  class="form-label">Select User Type :</label>
          </div>
          <select class="form-select mb-3" name="role" aria-label="Default select example">
            
            <option selected value="customer">Customer</option>
            <option value="admin">Admin</option>
            
          </select>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>