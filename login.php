<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="register.css">
  
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        <?php
        if (isset($_GET['error'])) {
            echo "<p style='color:red; text-align:center;'>Invalid email or password.</p>";
        }
        ?>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password_db = "";
        $dbname = "users";
        $port = 3306;

        try {
            // Create connection
            $conn = new mysqli($servername, $username, $password_db, $dbname, $port);

            // Check connection
            if ($conn->connect_error) {
                throw new Exception("Connection failed");
            }

            // Prepare and execute query
            $sql = "SELECT password FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->bind_result($hashed_password);
                if ($stmt->fetch() && password_verify($password, $hashed_password)) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    header("Location: home.php");
                } else {
                    header("Location: login.php?error=1");
                }
                $stmt->close();
            } else {
                throw new Exception("Login failed");
            }

            // Close connection
            $conn->close();
        } catch (Exception $e) {
            header("Location: login.php?error=1");
        }
        exit();
    }
    ?>
</body>
</html>
