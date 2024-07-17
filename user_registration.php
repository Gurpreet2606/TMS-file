<?php
// Establish database connection
$con = new mysqli('localhost', 'root', '', 'tms_db');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if form is submitted
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];

    // Insert into database
    $sql = "INSERT INTO `users`(`name`, `email`, `password`, `mobile`) VALUES ('$name','$email','$password', '$mobile')";
    
    if(mysqli_query($con, $sql)) {
        echo "Registration Successful";
        // Optionally redirect to another page after successful registration
        // header('Location: display.php');
        // exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<style>
body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
    background-image: url('image.jpg');
            background-size: cover; /* Adjusts the size of the background image to cover the entire body */
            background-repeat: no-repeat; /* Prevents the background image from repeating */
            background-position: center center; /* Centers the background image */
            background-attachment: fixed; /* Ensures the background image stays fixed as the content scrolls */
            background-color: #f0f0f0; /* Fallback background color */
            margin: 0;
            padding: 0;
}

.card {
    margin-top: 10px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.card-title {
    font-weight: bold;
    color: #333;
    width: 90%;
}

.btn {
    text-decoration: none;
}

.user-reg {
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .card {
        margin-top: 20px;
    }
}


</style>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center user-reg">User Registration</h3>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile No." required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-warning btn-block">Register</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="index.php" class="btn btn-danger">Go To Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
