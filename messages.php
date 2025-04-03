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

// Retrieve messages for the logged-in user
$query = "SELECT * FROM messages WHERE to_username = '$username' OR from_username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
  echo '<p>No messages found.</p>';
} else {
  echo '<h1>Messages</h1>';
  while ($message = mysqli_fetch_assoc($result)) {
    echo '<p>';
    echo '<strong>'. $message['from_username']. '</strong>: ';
    echo $message['content'];
    if ($message['from_username'] == $username) {
      echo ' <a href="edit_message.php?id='. $message['id']. '">Edit</a>';
      echo ' <a href="delete_message.php?id='. $message['id']. '">Delete</a>';
    }
    echo '</p>';
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Messages</title>
</head>
<body>
  <h1>Messages</h1>
  <form action="send_message.php" method="post">
    <label for="to_username">To:</label>
    <input type="text" id="to_username" name="to_username"><br><br>
    <label for="content">Message:</label>
    <textarea id="content" name="content"></textarea><br><br>
    <input type="submit" value="Send Message">
  </form>
</body>
</html>