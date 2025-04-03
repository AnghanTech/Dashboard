
<?php
// Sample events - replace with database-driven content later
$events = [
    ['title' => 'Staff Meeting', 'date' => '2023-12-20', 'location' => 'Main Hall'],
    ['title' => 'Training Session', 'date' => '2023-12-25', 'location' => 'Training Room']
];

foreach($events as $event): ?>
    <div class="event-item mb-2">
        <strong><?php echo htmlspecialchars($event['title']); ?></strong>
        <div class="text-muted small">
            <?php echo $event['date']; ?> - <?php echo htmlspecialchars($event['location']); ?>
        </div>
    </div>
<?php endforeach; ?>
