<?php
// Database configuration
$servername = "localhost"; // or the IP address if localhost doesn't work
$username = "root";
$password = "";
$dbname = "invento";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate and sanitize input (you can add more validation as needed)

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO feedback (firstname, lastname, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $message);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    echo "Feedback submitted successfully!";
} else {
    echo "Invalid request method!";
}
?>
