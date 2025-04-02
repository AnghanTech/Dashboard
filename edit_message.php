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

  // Retrieve the message from the database
  $query = "SELECT * FROM messages WHERE id = '$id'";
  $result = mysqli_query($conn, $query);
  $message = mysqli_fetch_assoc($result);

  if ($message['username'] != $username) {
    header('Location: messages.php');
    exit;
  }
}

if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $content = $_POST['content'];

  // Update the message in the database
  $query = "UPDATE messages SET content = '$content' WHERE id = '$id'";
  mysqli_query($conn, $query);

  header('Location: messages.php');
  exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Message</title>
</head>
<body>
  <h1>Edit Message</h1>
  <form action="edit_message.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <textarea name="content"><?php echo $message['content']; ?></textarea>
    <br>
    <input type="submit" name="edit" value="Edit Message">
  </form>
</body>
</html>