<?php
session_start();
include 'db.php'; // Include database connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check database connection
    if ($conn === false) {
        die("ERROR: Could not connect to the database. " . mysqli_connect_error());
    }

    // Prepare an insert statement
    $stmt = $conn->prepare("INSERT INTO login (email, password) VALUES (?, ?)");
    
    // Check if prepare() failed
    if ($stmt === false) {
        // Log the error (in a real application, consider logging this to a file)
        error_log("Prepare failed: " . $conn->error);
        die("ERROR: Could not prepare the SQL statement. Please try again later.");
    }

    // Bind parameters
    $stmt->bind_param("ss", $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful. You can now <a href='index.html'>login</a>.";
    } else {
        // Log the error (in a real application, consider logging this to a file)
        error_log("Execute failed: " . $stmt->error);
        echo "Registration failed. Please try again.";
    }

    // Close the statement
    $stmt->close();
}
echo "SQL Statement: " . $sql; // $sql is the SQL statement being prepared

// Close the database connection
$conn->close();
?>
