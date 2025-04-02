
<?php
// Sample notices - replace with database-driven content later
$notices = [
    ['title' => 'Welcome', 'content' => 'Welcome to AFS Portal', 'date' => date('Y-m-d')],
    ['title' => 'Notice', 'content' => 'System maintenance scheduled', 'date' => date('Y-m-d')]
];

foreach($notices as $notice): ?>
    <div class="notification mb-3 p-3">
        <h5><?php echo htmlspecialchars($notice['title']); ?></h5>
        <p><?php echo htmlspecialchars($notice['content']); ?></p>
        <small class="text-muted"><?php echo $notice['date']; ?></small>
    </div>
<?php endforeach; ?>
