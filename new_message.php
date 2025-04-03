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

if (isset($_POST['submit'])) {
  $to = $_POST['to'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Insert the new message into the database
  $query = "INSERT INTO messages (from_username, to_username, subject, message) VALUES ('$username', '$to', '$subject', '$message')";
  mysqli_query($conn, $query);

  header('Location: messages.php');
  exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>New Message</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
   .container {
      width: 800px;
      margin: 40px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>New Message</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <label for="to">To:</label>
      <input type="text" id="to" name="to" required><br><br>
      <label for="subject">Subject:</label>
      <input type="text" id="subject" name="subject" required><br><br>
      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea><br><br>
      <input type="submit" name="submit" value="Send">
    </form>
  </div>
</body>
</html>