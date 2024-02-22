<?php
session_start();
include("connection.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    } else {
        // Attempt to register the user if not found
        $registerSql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $registerStmt = $conn->prepare($registerSql);
        $registerStmt->bind_param("ss", $user, $pass);
        if ($registerStmt->execute()) {
            // Log the user in after successful registration
            $_SESSION['user'] = $user;
            header("Location: welcome.php");
        } else {
            echo "<script>alert('Registration failed or user already exists.');window.location.href = 'index.php';</script>";
        }
    }
}
?>
