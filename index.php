<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFS Portal - Modern Design</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap_mob.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="sdb_sf.png" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="facilities.php">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link" href="payment.php">Online Payment</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="apply.php">Apply</a></li>
                </ul>
                <a class="btn btn-primary ms-3" href="login.php">Admin Login</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Notice Board</h5>
                        <div class="glow-button"></div>
                    </div>
                    <div class="card-body notice-board">
                        <?php include 'includes/notices.php'; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Contact Us</h5>
                            </div>
                            <div class="card-body text-center">
                                <div class="content-text contact-info">
                                    AFS, UB-Diamond Club<br>
                                    SDB Diamond Bourse<br>
                                    <b>Phone: +91 261 691 7000</b><br>
                                    <b>E-mail: info@sdbbourse.com</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Member Assistance</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="nav-link">Member Details</a></li>
                                    <li><a href="#" class="nav-link">Archived Notice Board</a></li>
                                    <li><a href="#" class="nav-link">Changes and Taxes</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Upcoming Holidays</h5>
                    </div>
                    <div class="card-body">
                        <?php include 'includes/holidays.php'; ?>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Upcoming Events</h5>
                    </div>
                    <div class="card-body">
                        <?php include 'includes/events.php'; ?>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Important Links</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="#" class="nav-link">ICF GATE</a></li>
                            <li><a href="#" class="nav-link">DGSC</a></li>
                            <li><a href="#" class="nav-link">India</a></li>
                            <li><a href="#" class="nav-link">NIC</a></li>
                        </ul>
                    </div>
                </div>

                
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Disclaimer</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Designed & Developed by SDB Diamond Bourse, Surat, Gujarat.<br>
                        Managed & Maintained by Custodian, SDB Diamond Bourse, Surat, Gujarat.<br>
                        Version 1.0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>