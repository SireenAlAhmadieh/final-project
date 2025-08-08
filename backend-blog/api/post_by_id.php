
<?php

header('Content-Type: application/json');
require '../connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$post_id = $data['post_id'];

$stmt = $pdo->query("
    SELECT p.id, p.title, p.content, u.name AS author
    FROM posts p
    JOIN users u ON p.user_id = u.id
    WHERE p.id = $post_id
");
$post = $stmt->fetch(PDO::FETCH_ASSOC);

$comments = $pdo->query("
    SELECT c.id, c.content, u.name AS commenter
    FROM comments c
    JOIN users u ON c.user_id = u.id
    WHERE c.post_id = $post_id
    LIMIT 15
")->fetchAll(PDO::FETCH_ASSOC);

$post['comments'] = $comments;
echo json_encode($post);

?>
