
<?php
try {
    $db_path = __DIR__ . '/../database.sqlite';
    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create tables if they don't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Insert default admin user if not exists (password: admin123)
    $stmt = $pdo->prepare("INSERT OR IGNORE INTO users (username, password) VALUES (?, ?)");
    $stmt->execute(['admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi']);
    
    return $pdo;
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
