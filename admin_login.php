<?php
session_start(); // Start session at the beginning

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password']; // Correct case for 'password'

    // Using prepared statement to prevent SQL injection
    $query = "SELECT id, name, email FROM admin WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $total = mysqli_stmt_num_rows($stmt);

    if($total == 1) {
        mysqli_stmt_bind_result($stmt, $user_id, $user_name, $user_email);
        mysqli_stmt_fetch($stmt);

        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_email'] = $user_email; // Store user email in session

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header('location: admin_logindata.php');
        exit;
    } else {
        echo "Login Failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
    margin-top: 50px;
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

.btn_nik {
    margin-top: 20px;
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
                        <h3 class="card-title text-center">Admin Login</h3>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="adminlogin" class="btn btn-warning btn-block">Login</button>
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
