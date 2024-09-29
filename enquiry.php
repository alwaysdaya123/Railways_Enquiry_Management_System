<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Form</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('userlogin.png'); /* Ensure the image path is correct */
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff; /* Default text color */
            text-align: center; /* Center text */
        }

        form {
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent background for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 300px; /* Fixed width for the form */
        }

        select,
        input[type="date"] {
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
    <div>
        <form action="enquiry_result.php" method="post">
            <h2>Enquiry Form</h2>

            <label for="sp">Starting Point:</label>
            <select id="sp" name="sp" required>
                <option value="">Select Starting Point</option>
                <?php
                require "db.php";
                $cdquery = "SELECT sname FROM station";
                $cdresult = mysqli_query($conn, $cdquery);

                while ($cdrow = mysqli_fetch_array($cdresult)) {
                    $cdTitle = $cdrow['sname'];
                    echo "<option value=\"$cdTitle\">$cdTitle</option>";
                }
                ?>
            </select>

            <label for="dp">Destination Point:</label>
            <select id="dp" name="dp" required>
                <option value="">Select Destination Point</option>
                <?php
                require "db.php";
                $cdquery = "SELECT sname FROM station";
                $cdresult = mysqli_query($conn, $cdquery);

                while ($cdrow = mysqli_fetch_array($cdresult)) {
                    $cdTitle = $cdrow['sname'];
                    echo "<option value=\"$cdTitle\">$cdTitle</option>";
                }
                ?>
            </select>

            <label for="doj">Date of Journey:</label>
            <input type="date" name="doj" required>

            <input type="submit" value="Submit">
        </form>

        <br>
        <a href="http://localhost/railway/index.htm">Go to Home Page!!!</a>
    </div>
</body>
</html>
