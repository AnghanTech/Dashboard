<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Connect to the database
$conn = mysqli_connect('localhost:8082', 'root', 'root', 'messaging_system');

if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Retrieve the user's details from the database.  This assumes 'user_id' is available in the session and the database.  Adjust as needed based on your database schema.
$query = "SELECT * FROM users WHERE id = '{$_SESSION['user_id']}'"; // Assuming 'id' is the primary key in your 'users' table
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  $user = mysqli_fetch_assoc($result);
  $_SESSION['username'] = $user['username'];
} else {
  header('Location: login.php');
  exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CMS Dashboard</title>
    <link rel="stylesheet" href="bootstrap_mob.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a href="notices.php" class="nav-link">Manage Notices</a></li>
                <li class="nav-item"><a href="holidays.php" class="nav-link">Manage Holidays</a></li>
                <li class="nav-item"><a href="events.php" class="nav-link">Manage Events</a></li>
                <li class="nav-item"><a href="gallery.php" class="nav-link">Manage Gallery</a></li>
                <li class="nav-item"><a href="facilities.php" class="nav-link">Manage Facilities</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>