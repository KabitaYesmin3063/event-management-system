<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="attendees.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['Event Name', 'User Name', 'Registered At']);

$result = $conn->query("SELECT e.name as event_name, u.name as user_name, r.registered_at 
                        FROM registrations r 
                        JOIN events e ON r.event_id = e.id 
                        JOIN users u ON r.user_id = u.id");

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
?>
