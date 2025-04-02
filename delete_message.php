<?php
session_start();

if (!isset($_SESSION['sessionId'])) {
  header('Location: login.html');
  exit;
}

$username = $_SESSION['username'];

// Connect to the database
$conn = mysqli_connect('localhost:8082', 'root', 'root', 'messaging_system');

if (!$conn) {
  die('Connection failed: '. mysqli_connect_error());
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Delete the message from the database
  $query = "DELETE FROM messages WHERE id = '$id'";
  mysqli_query($conn, $query);

  header('Location: messages.php');
  exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Delete Message</title>
</head>
<body>
  <!-- This page will automatically redirect to messages.php after deleting the message -->
</body>
</html>