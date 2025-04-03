
<?php
$db_host = '0.0.0.0';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'messaging_system';
$db_port = 8082;

function getDbConnection() {
    global $db_host, $db_user, $db_pass, $db_name, $db_port;
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    return $conn;
}
?>
