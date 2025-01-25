<?php
include '../includes/db.php';

$result = $conn->query("SELECT * FROM users");
?>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    <?php while ($user = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['role'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>
