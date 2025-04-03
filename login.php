
<?php
session_start();
$error = '';

// Database configuration
$db_host = '0.0.0.0';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'messaging_system';

try {
    // Create database if it doesn't exist
    $temp_conn = mysqli_connect($db_host, $db_user, $db_pass);
    if (!$temp_conn) {
        throw new Exception(mysqli_connect_error());
    }
    mysqli_query($temp_conn, "CREATE DATABASE IF NOT EXISTS $db_name");
    mysqli_close($temp_conn);

    // Connect to the database
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        throw new Exception(mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];

        // Create users table if it doesn't exist
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
        )";
        mysqli_query($conn, $sql);

        // Check if admin user exists, if not create it
        $check_admin = "SELECT * FROM users WHERE username='admin'";
        $result = mysqli_query($conn, $check_admin);
        if(mysqli_num_rows($result) == 0) {
            $admin_pass = password_hash('admin123', PASSWORD_DEFAULT);
            $create_admin = "INSERT INTO users (username, password) VALUES ('admin', '$admin_pass')";
            mysqli_query($conn, $create_admin);
        }

        // Verify login
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header('Location: dashboard.php');
                exit();
            }
        }
        $error = "Invalid username or password";
    }
} catch (Exception $e) {
    $error = "Database error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2 class="text-center mb-4">CMS Login</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
