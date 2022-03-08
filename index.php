<?php
$insert = false;
if(isset($_POST['name'])){
// set connection variable
$server="localhost";
$username="root";
$password="";
// create a database connection
$con = mysqli_connect($server, $username, $password);

// check for connection 
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo "success connecting to the database ok";
// collect post variable
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

// execute the query
if($con->query($sql) == true){
    // echo "successfully inserted";

    // flag for successful insertion
    $insert = true;
}else{
    echo "error $sql <br> $con->error";
}

// close the database connection
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form Submission</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>Welcome to Nepal Enginnering College Trip form to US</h3>
        <p>Enter Your details and submit your form to confirm your participation in the trip </p>
        
        <?php
        if($insert == true){
           echo  "<p class='submitMsg'>Thanks for submitting your form. we are happy to see you joining us for the US trip</p>";
        };
        ?>
        <form action = "index.php" method="post" >
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter Your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your information"></textarea>
            <button class="btn">Submit</button>
            

        </form>
    </div>
    
</body>
<script src="index.js"></script>
</html>