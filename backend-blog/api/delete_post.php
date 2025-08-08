
<?php
header('Content-Type: application/json');
require '../connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$post_id = $data['post_id'];

$pdo->exec("DELETE FROM comments WHERE post_id = $post_id");
$pdo->exec("DELETE FROM posts WHERE id = $post_id");

echo json_encode(['message' => 'Post deleted']);
?>
