<?php
$servername = "localhost"; // Replace with your server name
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$dbname = "your_database"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO Appointments (FirstName, LastName, Email, AppointmentDate, Theme) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstName, $lastName, $email, $appointmentDate, $theme);

// Set parameters and execute
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$appointmentDate = $_POST['appointmentDate'];
$theme = $_POST['theme'];
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>