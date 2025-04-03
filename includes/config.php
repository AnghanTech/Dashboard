
<?php
$db_host = '0.0.0.0';
$db_user = 'root';
$db_pass = '';
$db_name = 'messaging_system';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
