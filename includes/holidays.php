
<?php
// Sample holidays - replace with database-driven content later
$holidays = [
    ['title' => 'New Year', 'date' => '2024-01-01'],
    ['title' => 'Republic Day', 'date' => '2024-01-26']
];

foreach($holidays as $holiday): ?>
    <div class="holiday-item mb-2">
        <strong><?php echo htmlspecialchars($holiday['title']); ?></strong>
        <div class="text-muted small"><?php echo $holiday['date']; ?></div>
    </div>
<?php endforeach; ?>
