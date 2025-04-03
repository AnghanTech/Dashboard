
<?php
try {
    $db_host = '127.0.0.1';
    $db_user = 'runner';
    $db_pass = '';
    $db_name = 'messaging_system';
    
    $dsn = "pgsql:host=$db_host;dbname=$db_name";
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
