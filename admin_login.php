<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('adminlogin.jpeg');
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
        }

        form {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 300px;
            margin: 20px;
        }

        input[type="text"], 
        input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            width: 100%;
        }

        input[type="submit"] {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: green;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: darkgreen;
        }

        a {
            color: #fff;
            text-decoration: none;
            margin-top: 15px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            background: rgba(255, 0, 0, 0.8); /* Red background */
            color: white; /* White text */
            padding: 10px; /* Padding around the text */
            border-radius: 5px; /* Rounded corners */
            margin-top: 10px; /* Space above the box */
            display: inline-block; /* Make it fit content */
            width: 100%; /* Full width of the form */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); /* Slight shadow */
        }
    </style>
</head>
<body>
<div align="center">
<?php 
session_start();

// Initialize error message
$error_message = "";

// Check if the form has been submitted
if (isset($_POST["uid"]) && isset($_POST["password"])) {
    if ($_POST["uid"] === 'admin' && $_POST["password"] === 'admin') {
        $_SESSION["admin_login"] = true;
    } else {
        $error_message = "Invalid User ID or Password."; // Set error message
    }
}

// Check if the admin is logged in
if (isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] === true) {
    echo "<br><a href=\"http://localhost/railway/insert_into_stations.php\">Show All Stations</a><br>";
    echo "<br><a href=\"http://localhost/railway/show_trains.php\">Show All Trains</a><br>";
    echo "<br><a href=\"http://localhost/railway/show_users.php\">Show All Users</a><br>";
    echo "<br><a href=\"http://localhost/railway/insert_into_train_3.php\">Enter New Train</a><br>";
    echo "<br><a href=\"http://localhost/railway/insert_into_classseats_3.php\">Enter Train Schedule</a><br>";
    echo "<br><a href=\"http://localhost/railway/booked.php\">View All Booked Tickets</a><br>";
    echo "<br><a href=\"http://localhost/railway/cancelled.php\">View All Cancelled Tickets</a><br>";
    //echo "<br><a href=\"http://localhost/railway/logout.php\">Logout</a><br>";
} else {
    // Show the login form
    echo "
    <form action=\"admin_login.php\" method=\"post\">
        <h2>Admin Login</h2>
        User ID: <input type=\"text\" name=\"uid\" required><br>
        Password: <input type=\"password\" name=\"password\" required><br>
        <input type=\"submit\" value=\"Login\">
        <div class=\"error\">$error_message</div> <!-- Display error message -->
    </form>
    ";
}
?>
<br><a href="http://localhost/railway/index.htm">Go to Home Page!!!</a>
</div>
</body>
</html>
