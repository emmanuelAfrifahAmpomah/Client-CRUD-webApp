
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">  <!-- Bootsrtap -->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css" media="screen"> <!-- style directory -->
     <!--font-family-->


    <title>Project CRUD Application</title>
</head>
<body class="bg-secondary">
    <div class="container container-lg-fluid container-md container-sm container-xs mt-xs-5 mt-sm-5 mt-sm-5 mt-md-5 my-5">
      <div class="row">
        <!-- <div class="col col-md-60 col-xs-4">
          <div class="contents"> -->
            <h1 class="text-center center">List of Clients</h1>
            <div class="col-12 my-3 table-responsive table-responsive-md table-responsive-sm table-responsive-xs">
            <a href="add.php" class="btn btn-primary mb-3 col-sm-3 d-grid">Add new client</a>
            <div class="table-responsive table-responsive-lg table-responsive-xl table-responsive-xxl table-responsive-md table-responsive-sm table-responsive-xs">
            <table class="table table-bordered border-warning table-warning table-hover table-striped">
            <thead class="table-danger">
      
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Created_At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
  <?php
require_once 'backend/fetch.php';
?>
  </tbody>
</table>
            </div>
          <!-- </div>-->
        </div> 
      </div>
    </div>
</body>

<script src="bootstrap\js\bootstrap.bundle.js"></script> <!-- bootstrap javascript -->
</html>