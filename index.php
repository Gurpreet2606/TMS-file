<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Task Management System</title>
    <!-- Linking external CSS file -->
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            /* Adding background image */
            background-image: url('image.jpg');
            background-size: cover; /* Adjusts the size of the background image to cover the entire body */
            background-repeat: no-repeat; /* Prevents the background image from repeating */
            background-position: center center; /* Centers the background image */
            background-attachment: fixed; /* Ensures the background image stays fixed as the content scrolls */
            background-color: #f0f0f0; /* Fallback background color */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 15% auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            text-align: center;
        }
        .btn-container {
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            margin: 0 10px;
            display: inline-block;
        }
        .btn-success {
            background-color: #4CAF50;
            color: white;
        }
        .btn-success:hover {
            background-color: #45a049;
        }
        .btn-warning {
            background-color: #ffc107;
            color: white;
        }
        .btn-warning:hover {
            background-color: #ffa000;
        }
        .btn-info {
            background-color: #2196F3;
            color: white;
        }
        .btn-info:hover {
            background-color: #1e88e5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Employee Task Management System</h1>
        
        <div class="btn-container">
            <a href="user_login.php" class="btn btn-success">User Login</a>
            <a href="user_registration.php" class="btn btn-warning">User Registration</a>
            <a href="admin_login.php" class="btn btn-info">Admin Login</a>
        </div>
    </div>
</body>
</html>
