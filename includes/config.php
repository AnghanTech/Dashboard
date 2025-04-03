
<?php
$db_host = '0.0.0.0';
$db_user = 'postgres';
$db_pass = 'postgres';
$db_name = 'messaging_system';

try {
    $dsn = "pgsql:host=$db_host;dbname=$db_name";
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
