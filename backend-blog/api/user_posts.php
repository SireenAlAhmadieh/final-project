
<?php

header('Content-Type: application/json');
require '../connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];

$stmt = $pdo->query("SELECT id, title, content
                    FROM posts
                    WHERE user_id = $user_id
                    LIMIT 10 ");

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($posts);

?>
