<?php
$insert=false;
if (isset($_POST['name'])){
    // set connection variables
    $server="localhost";
    $submit = true;
    $username = "root";
    $password = "";
    // create a database connection
    $con = mysqli_connect($server, $username, $password);

    // check for connection success
    if(!$con){
        die("connection to this database failed due to".
        mysqli_connect_error());
    }
    // echo "Success connecting to the database";

    // colect post variables
    $name   = $_POST['name'];
    $age    = $_POST['age'];
    $gender = $_POST['gender'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $des    = $_POST['des'];
    
    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `des`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$des', current_timestamp());";


    if($con->query($sql) == true){
        // lag for successful insertion
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // close the db connection
    $con->close();
}
?>

<!-- HTML code -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">
</head>


<body>
    <img class="bg" src="bg.jpeg" alt="DCE">
    <div class="container">
        <h1>Welcome to DCE US TRIP FORM</h1>
        <p>Enter deatils and submit to confirm your patcipation in the trip</p>
        <?php 
        if ($insert == true){
        echo "<p class='submitMsg'>Thanks! We are happy to have you onboard!</p>";}
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="des" id="des" cols="30" rows="10" placeholder="Enter any otehr information here">
            

            </textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>

    <script src="index.js">

    </script>
    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `des`, `dt`) VALUES ('1', 'prerna', '21', 'female', 'mprerna802@gmail.com', '9821830727 ', 'descr', current_timestamp()); -->
</body>
</html>