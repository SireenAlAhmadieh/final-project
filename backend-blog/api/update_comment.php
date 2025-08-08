
<?php

header('Content-Type: application/json');
require '../connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$comment_id = $data['comment_id'];
$content = $data['content'];

$sql = "UPDATE comments SET content = '$content' WHERE id = $comment_id";
$pdo->exec($sql);

echo json_encode(['message' => 'Comment updated']);

?>
