<?php
  require_once 'backend/dbconnection.php';


$name="";
$email="";
$phone="";
$address="";
// re-written as: $name = $email = $phone = $address ='';

// initialize the error message variable
$errorMessage = "";

// initialize the success message variable
$successMessage="";

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);



        // checking for valid email address
        // $emailValid = (filter_var($email, FILTER_VALIDATE_EMAIL))


    //checking whether there is no empty field. We 'break' from the loop if there's any error and show an error message
    do {
        if (empty($name)||empty($email) && $emailValid ||empty($phone)||empty($address)) {
            $errorMessage = 'All fields are required';
            break;
        }

            // if there is no empty field then we proceed to create a new client to database
            $sql = "INSERT INTO clients_data (name, email, phone, address)" . 
            "VALUES ('$name', '$email', '$phone', '$address')";
            $result = $connection->query($sql);

        if (!$result) {
            die("could not add data to database: " . $connection->connect_error);
            break;
        }

            // after adding client, we initialize the data variables to empty values

            $name="";
            $email="";
            $phone="";
            $address="";

            // we proceed to show a success message
            $successMessage="Client successfully added to database";

            // redirects to list of clients page
            header("location: index.php");
            exit;
        }while(false);
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
    <div class="container my-3">
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
             <div class="form-group mb-3">
                <h3><label for="name">Name</label></h3>
                <input type="text" class="form-control" placeholder="Full name" name="name" value="<?=htmlspecialchars($name)?>">
             </div>
             <div class="form-group mb-3">
             <h3><label for="email">Email</label></h3>
                <input type="text" class="form-control" placeholder="@example.com" name="email" value="<?=htmlspecialchars($email)?>">
             </div>
             <div class="form-group mb-3">
             <h3><label for="phone">Phone</label></h3>
               <input type="text" class="form-control" placeholder="" name="phone" value="<?=htmlspecialchars($phone)?>">
             </div>
             <div class="form-group mb-5">
             <h3><label for="address">Address</label></h3>
              <input type="text" class="form-control" placeholder="" name="address" value="<?=htmlspecialchars($address)?>">
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
                 <a class="btn btn-danger mb-1" href="index.php" role="cancel">cancel</a>
               </div>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="bootstrap\js\bootstrap.bundle.js"></script> <!-- bootstrap javascript -->
</html>
