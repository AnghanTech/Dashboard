<?php
session_start();
require_once 'includes/config.php';

// Security checks
if (!isset($_SESSION['user_id']) || !isset($_SESSION['last_activity'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

// Session timeout after 30 minutes
if (time() - $_SESSION['last_activity'] > 1800) {
    session_destroy();
    header('Location: login.php?timeout=1');
    exit();
}
$_SESSION['last_activity'] = time();

try {
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        session_destroy();
        header('Location: login.php');
        exit();
    }
} catch (Exception $e) {
    error_log("Dashboard Error: " . $e->getMessage());
    header('Location: login.php?error=1');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CMS System</title>
    <link rel="stylesheet" href="bootstrap_mob.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <img src="sdb_sf.png" alt="Logo" class="img-fluid" style="max-width: 120px">
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="manage_content.php">Content</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="notices.php">Notices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="events.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="gallery.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="facilities.php">Facilities</a>
                        </li>
                        <li class="nav-item">
                            <form action="logout.php" method="POST" class="m-0">
                                <button type="submit" class="nav-link text-danger border-0 bg-transparent w-100 text-start">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Welcome, <?php echo htmlspecialchars($user['username']); ?></h2>
                    <small class="text-muted">Last login: <?php echo $user['last_login'] ? date('d M Y H:i', strtotime($user['last_login'])) : 'First login'; ?></small>
                </div>

                <div class="row">
                    <!-- Dashboard content here -->
                    <div class="col-md-4">
                        <div class="stats-card">
                            <h3>Total Notices</h3>
                            <h2>25</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stats-card">
                            <h3>Total Events</h3>
                            <h2>12</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stats-card">
                            <h3>Gallery Items</h3>
                            <h2>45</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Recent Activities</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Activity</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>New notice added</td>
                                                <td><?php echo date('Y-m-d H:i'); ?></td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>