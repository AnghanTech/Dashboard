
<?php
try {
    $db_url = getenv('DATABASE_URL');
    if (!$db_url) {
        throw new Exception('DATABASE_URL environment variable is not set');
    }
    
    $pdo = new PDO($db_url);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
