<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    
    // Hashing the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ss", $username, $hashed_password);
        if ($stmt->execute()) {
            echo "Registered successfully.";
            // Redirect or inform the user
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
$conn->close();
?>
