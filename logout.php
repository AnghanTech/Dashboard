<?php
session_start();

// Destroy the session
session_destroy();

header('Location: login.html');
exit;
?>