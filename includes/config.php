
<?php
$db_host = '0.0.0.0';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'messaging_system';
$db_port = 3306;

function getDbConnection() {
    global $db_host, $db_user, $db_pass, $db_name, $db_port;
    
    try {
        $conn = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>
