<?php
require_once 'config.php';

// Set the content type to JSON
header('Content-Type: application/json');

// Handle HTTP methods
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Check if an ID parameter is provided
        if(isset($_GET['shr_id'])) {
            // Read operation (fetch a single portrait by shr_)
            $shr_id = $_GET['shr_id'];
            $stmt = $pdo->prepare('SELECT * FROM semi_hyperrealistic WHERE shr_id = ?');
            $stmt->execute([$shr_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result) {
                echo json_encode($result);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Portrait not found']);
            }
        } else {
            // Read operation (fetch all portraits)
            $stmt = $pdo->query('SELECT * FROM semi_hyperrealistic');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }
        break;
        
    default:
        // Invalid method
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
?>
