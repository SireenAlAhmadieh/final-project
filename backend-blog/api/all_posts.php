
<?php

header('Content-Type: application/json');
require '../connection.php';

$sql = "SELECT p.id, p.title, p.content, u.name AS author, (SELECT COUNT(*) FROM comments c WHERE c.post_id = p.id) AS comment_count
        FROM posts p
        JOIN users u ON p.user_id = u.id";

$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($posts);

?>
