<?php
require_once 'config.php';

// Set the content type to JSON
header('Content-Type: application/json');

// Handle HTTP methods
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Check if an ID parameter is provided
        if(isset($_GET['details_id'])) {
            // Read operation (fetch a single detail by details_id)
            $details_id = $_GET['details_id'];
            $stmt = $pdo->prepare('SELECT * FROM details WHERE details_id = ?');
            $stmt->execute([$details_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result) {
                echo json_encode($result);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Detail not found']);
            }
        } else {
            // Read operation (fetch all details)
            $stmt = $pdo->query('SELECT * FROM details');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }
        break;
    case 'POST':
        // Handle POST method (create operation)
        // Extract data from the request body
        $data = json_decode(file_get_contents("php://input"), true);
        
        // Validate data
        if (empty($data['quality']) || empty($data['description']) || empty($data['starting_price']) || empty($data['duration'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Incomplete data provided']);
        } else {
            // Insert the new detail into the database
            $sql = "INSERT INTO details (quality, description, starting_price, duration) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$data['quality'], $data['description'], $data['starting_price'], $data['duration']])) {
                http_response_code(201);
                echo json_encode(['message' => 'Detail created successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Failed to create detail']);
            }
        }
        break;
    default:
        // Invalid method
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
?>
