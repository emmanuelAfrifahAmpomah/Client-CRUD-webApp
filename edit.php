<?php
require_once 'backend/dbconnection.php';

$id="";
$name="";
$email="";
$phone="";
$address="";

// initialize the error message variable
$errorMessage = "";

// initialize the success message variable
$successMessage="";

// checking if method used is GET; and if true, we read the id of the client
if ($_SERVER['REQUEST_METHOD']=='GET') {
    
    // if id of the client does not exist, redirect to the index page and exit
    if(!isset($_GET["id"])) {
        header("Location: index.php");
        exit;
    }
    
    $id=$_GET["id"]; //use GET method for id and asign it to an id variable

    // read the row of selected client from database table
    $sql = "SELECT * FROM clients_data WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    // if no data exists in the database redirect and exit
    if (!$row) {
        header("location: index.php");
        exit;
    }
    // if the data can be read, show the data of the client by storing the data retrieved in the respective variables
    $name=$row["name"];
    $email=$row["email"];
    $phone=$row["phone"];
    $address=$row["address"];
}

// If POST method, then update the data of the client
else {
    // read and store the data of the form into respective variables
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];

    // checking for empty fields using a do while loop
    do {
        if ( empty($id)||empty($name)||empty($email)||empty($phone)||empty($address)) {
            $errorMessage = 'All fields are required';
            break;
        }

        // if no empty fields, update table details
        $sql = "UPDATE clients_data " .
            "SET name= '$name', email= '$email', phone= '$phone', address= '$address' " . 
            "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Unable to update client information" . $connection->error;
            break;
        }

        $successMessage="Details updated successfully";

        // redirect the user after
        header("location: index.php");
        exit;

}while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding new client page</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">  <!-- Bootsrtap -->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css" media="screen"> <!-- style directory -->
</head>
<body class="bg-secondary">
    <div class="container my-5">
    <div class="row">
    <h1>Add new Client</h1>
        <div class="col-12 my-3">
            <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            };
            ?>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id?>">
             <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Full name" name="name" value="<?=$name?>">
             </div>
             <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="@example.com" name="email" value="<?=$email?>">
             </div>
             <div class="form-group mb-3">
               <label for="phone">Phone</label>
               <input type="text" class="form-control" placeholder="" name="phone" value="<?=$phone?>">
             </div>
             <div class="form-group mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" placeholder="" name="address" value="<?=$address?>">
             </div>
             <?php
             if(!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                </div>
                </div>
                ";
            }
             ?>
            <div class="row mb-3">
               <div class="offset-sm-3 col-sm-3 d-grid">
                  <button id="submit" type="submit" class="btn btn-primary mb-1" name="submit">Submit</button>
               </div>
               <div class="col-sm-3 d-grid">
                 <a class="btn btn-danger mb-1" href="" role="cancel">cancel</a>
               </div>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="bootstrap\js\bootstrap.bundle.js"></script> <!-- bootstrap javascript -->
</html>