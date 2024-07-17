<?php
session_start(); // Start session to access session variables

// Check if user is logged in, otherwise redirect to login page
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

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

// Fetch user information from session
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

// Fetch additional user details from database
$user_id = $_SESSION['user_id'];
$query = "SELECT name, email, mobile FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $db_name, $db_email, $db_mobile);
mysqli_stmt_fetch($stmt);

// Close statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            background-image: url('image.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
        #header {
    background-color: #333; /* Dark background color for header */
    color: #fff; /* White text color */
    padding: 10px; /* Padding for header content */
    
}
#header .container {
    padding: 10px; /* Padding for each item */
    height: 60px; /* Adjusted to auto for flexible height */
    width: 100%;
    margin:auto;
}
#header h1{
    margin: 0; 
    display: inline-block; 
    text-align:left;
    padding-top: 10px;
}
#header h3, #header p {
    text-align:center;
    margin: 0; 
    display: inline-block; 
    margin-right:25px;
    padding-bottom: 100px; 
}
#header h3{
    padding-left: 800px;
}

.dashboard-table {
    width: 70%;
    border-collapse: collapse;
    margin-top: 20px; /* Adjust as needed */
}

.dashboard-table td {
    padding: 15px 0;
    text-align: center;
    border-bottom: 1px solid #ddd; /* Adding a bottom border for separation */
  
}

.dashboard-link {
    display: block;
    text-decoration: none;
    color: black; /* Link color */
    font-weight: bold;
    font-size:20px;
    padding: 10px;
    transition: background-color 0.3s ease;
}

.dashboard-link:hover {
    background-color: #f5f5f5; /* Light background color on hover */
}
#right_side {
    background-color: #f5f5f5; /* Light background color */
            padding: 20px;
            border: 1px solid #ddd; /* Border for visual separation */
            border-radius: 8px; /* Rounded corners */
            margin-top: 50px; /* Top margin */
            width:40%;
            height:30%;
            
        }

        ul {
            margin-top: 10px; /* Top margin for the list */
            padding-left: 20px; /* Left padding for list items */
        }

        li {
            font-size: 16px; /* Font size for list items */
            line-height: 3; /* Line height for better readability */
        }


.row {
    display: flex; 
}

.col-md-2 {
    width: 20%; /* Adjust width as needed */
}

 </style>
</head>
<body>
    <div id="header">
        <div class="container">
            <h1>Task Management System</h1> 
            <div>
                <h3>Welcome, <?php echo htmlspecialchars($user_name); ?></h3>
                <p>Email: <?php echo htmlspecialchars($user_email); ?></p>
                <p>Mobile: <?php echo htmlspecialchars($db_mobile); ?></p>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-2" id="left_side">
    <table class="table dashboard-table">
        <tr>
            <td>
                <a href="user_dashboard.php" class="dashboard-link">Dashboard</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="manage_task.php" class="dashboard-link">Update Task</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="apply_leave.php" class="dashboard-link">Apply Leave</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="view_leave.php" class="dashboard-link">Leave Status</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="logout.php" class="dashboard-link">Logout</a>
            </td>
        </tr>
    </table>
</div>
<div class="col-md-10" id="right_side">
            <h2>Instructions For Employees<h2>
            <ul>
                <li> All Employees should mark their attendance daily.</li>
                <li>Everyone must complete the task assigned to them.</li>
                <li>Kindly maintain decorum in the office.</li>
                <li> Keep the office and your area neat and clean.</li>
            </ul>
        </div>
</div>
</body>
</html>

