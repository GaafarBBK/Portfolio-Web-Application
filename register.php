<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <style>
        .notification {
            background-color: #f44336; /* Red */
            color: white;
            padding: 15px;
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000;
            border-radius: 5px;
            display: none;
        }
        .notification.success {
            background-color: #4CAF50; /* Green */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <div id="notification" class="notification"></div>
        <form action="register.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Register">
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const params = new URLSearchParams(window.location.search);
            if (params.has('message')) {
                const notification = document.getElementById('notification');
                notification.textContent = params.get('message');
                notification.classList.add(params.get('type') === 'success' ? 'success' : 'error');
                notification.style.display = 'block';
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users";
    $port = 3306;

    try {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed");
        }

        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

        // Insert data into database
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $password);
            if ($stmt->execute()) {
                header("Location: register.php?message=Registration successful. Please log in.&type=success");
            } else {
                throw new Exception("Registration failed");
            }
            $stmt->close();
        } else {
            throw new Exception("Registration failed");
        }

        // Close connection
        $conn->close();
    } catch (Exception $e) {
        header("Location: register.php?message=" . urlencode($e->getMessage()) . "&type=error");
    }
    exit();
}
?>