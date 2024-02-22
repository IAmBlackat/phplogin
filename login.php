<?php
session_start();
include("connection.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $user;
        header("Location: welcome.php"); // Redirect to a welcome page
    } else {
        echo "<script>alert('Username or password is incorrect!');</script>";
    }
}
?>
