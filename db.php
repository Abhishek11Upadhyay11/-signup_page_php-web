<?php
$server = "127.0.0.1:4306"; // Corrected typo in variable name
$username = "root";
$password = "";
$dbname = "users";
$result = "";
$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    echo "not connected";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'name' and 'email' are set in $_POST
    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);

        // Inserting the data
        $sql = "INSERT INTO spotify (name, email) VALUES ('$name', '$email')";

        // Executing the query
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "Data Inserted";
        } else {
            echo "Error while submitting";
        }
    } else {
        echo "Name and email are required";
    }
} else {
    echo "Form not submitted";
}

// Close connection
mysqli_close($con);
?>










