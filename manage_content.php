
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect('localhost', 'root', 'root', 'messaging_system', 8082);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section = $_POST['section'];
    $content = $_POST['content'];
    
    $query = "UPDATE page_content SET content = ? WHERE section = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $content, $section);
    mysqli_stmt_execute($stmt);
}

$query = "SELECT * FROM page_content";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Content Management</title>
    <link rel="stylesheet" href="bootstrap_mob.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Content Management</h2>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo htmlspecialchars($row['section']); ?></h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="section" value="<?php echo htmlspecialchars($row['section']); ?>">
                            <textarea name="content" class="form-control" rows="4"><?php echo htmlspecialchars($row['content']); ?></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</body>
</html>
