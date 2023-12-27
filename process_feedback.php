<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $message = $_POST["meassege"]; // Correct the spelling here to match the form field name

    // Validate and sanitize input (you can add more validation as needed)

    // Save data to a file
    $data = "Name: $name\nLast Name: $lastName\nEmail: $email\nMessage: $message\n\n";
    file_put_contents("feedback_data.txt", $data, FILE_APPEND);

    // You can also store data in a database instead of a file if needed

    echo "Feedback submitted successfully!";
} else {
    echo "Invalid request method!";
}
?>
