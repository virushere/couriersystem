<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    
    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    
    // Collect post variables
    $name = $_POST['name'];
    $aadhar = $_POST['aadhar'];
    $dpin = $_POST['dpin'];
    $area = $_POST['area'];
    $product = $_POST['product'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `dpin`, `aadhar`, `area`, `product`, `other`, `dt`) VALUES ('$name', '$dpin', '$aadhar', '$area', '$product', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to A to Z services.</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="a2z.png" alt="A TO Z COURIERS">
    <div class="container">
        <h1>A TO Z COURIER SERVICES</h3>
        <p>Enter Submit After Filling Form</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form and for choosing us as partner!</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Recivers name">
            <input type="text" name="dpin" id="dpin" placeholder="Enter your deliery pincode">
            <input type="text" name="aadhar" id="aadhar" placeholder="Enter your aadharcard number">
            <input type="area" name="area" id="area" placeholder="Enter area of your parcel">
            <input type="product" name="product" id="product" placeholder="Enter your product Information">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your Name ,phone number and enter your address"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html> 