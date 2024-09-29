<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Result</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('pnglogin.jpg'); /* Ensure the image path is correct */
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff; /* Default text color */
            text-align: center; /* Center text */
        }

        table {
            margin: 20px 0;
            border-collapse: collapse;
            width: 80%; /* Table width */
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent background for the table */
            border-radius: 10px;
            overflow: hidden; /* Rounded corners */
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #fff; /* Table row separator */
        }

        th {
            background-color: #333; /* Darker background for header */
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Highlight on hover */
        }

        form {
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent background for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 300px; /* Fixed width for the form */
            margin-top: 20px; /* Margin above form */
        }

        input[type="text"], 
        input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            width: 100%; /* Full width of the form */
        }

        input[type="submit"] {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: green;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%; /* Full width of the form */
        }

        input[type="submit"]:hover {
            background-color: darkgreen; /* Darker green on hover */
        }

        a {
            color: #fff; /* Link color */
            text-decoration: none;
            margin-top: 15px;
            display: inline-block; /* Makes the link block-level */
        }

        a:hover {
            text-decoration: underline; /* Underline effect on hover */
        }
    </style>
</head>
<body>
    <?php 
    session_start();
    require "db.php";

    $doj = $_POST["doj"];
    $_SESSION["doj"] = "$doj";
    $sp = $_POST["sp"];
    $_SESSION["sp"] = "$sp";
    $dp = $_POST["dp"];
    $_SESSION["dp"] = "$dp";

    $query = mysqli_query($conn,"SELECT t.trainno, t.tname, c.sp, s1.departure_time, c.dp, s2.arrival_time, t.dd, c.class, c.fare, c.seatsleft FROM train as t, classseats as c, schedule as s1, schedule as s2 WHERE s1.trainno=t.trainno AND s2.trainno=t.trainno AND s1.sname='".$sp."' AND s2.sname='".$dp."' AND t.trainno=c.trainno AND c.sp='".$sp."' AND c.dp='".$dp."' AND c.doj='".$doj."'");

    echo "<table><thead><tr><th>Train No</th><th>Train Name</th><th>Starting Point</th><th>Arrival Time</th><th>Destination Point</th><th>Departure Time</th><th>Day</th><th>Train Class</th><th>Fare</th><th>Seats Left</th></tr></thead><tbody>";

    while($row = mysqli_fetch_array($query)) {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr>";
    }
    echo "</tbody></table>";

    if(mysqli_num_rows($query) == 0) {
        echo "<p>No such train <br></p>";
    }
    ?>

    <div>
        <p>If you wish to proceed with booking, fill in the following details:</p>
        <form action="resvn.php" method="post">
            <label for="mno">Registered Mobile No:</label>
            <input type="text" name="mno" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            
            <label for="tno">Enter Train No:</label>
            <input type="text" name="tno" required>
            
            <label for="class">Enter Class:</label>
            <input type="text" name="class" required>
            
            <label for="nos">No. of Seats:</label>
            <input type="text" name="nos" required>
            
            <input type="submit" value="Proceed with Booking">
        </form>
    </div>

    <?php
    echo "<a href=\"http://localhost/railway/enquiry.php\">More Enquiry</a> <br>";
    $conn->close(); 
    ?>

    <br>
    <a href="http://localhost/railway/index.htm">Go to Home Page!!!</a>
</body>
</html>
