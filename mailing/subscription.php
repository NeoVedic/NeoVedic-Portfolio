<?php
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    
    if (!$email) {
        throw new Exception('Please enter a valid email address');
    }

    $db = new PDO('sqlite:' . __DIR__ . '/subscribers.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $db->exec("CREATE TABLE IF NOT EXISTS subscribers (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT UNIQUE NOT NULL,
        subscribed_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    
    $stmt = $db->prepare("INSERT INTO subscribers (email) VALUES (?)");
    
    try {
        $stmt->execute([$email]);
        $response['success'] = true;
        $response['message'] = 'Thank you for subscribing! You will receive our latest updates.';
        
        $send_notification = false;
        if ($send_notification && file_exists(__DIR__ . '/mailfunction.php')) {
            require_once(__DIR__ . '/mailfunction.php');
            $body = "<p>New newsletter subscription:</p><ul><li>Email: " . htmlspecialchars($email) . "</li><li>Date: " . date('Y-m-d H:i:s') . "</li></ul>";
            mailfunction("", "Company", $body);
        }
        
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $response['success'] = false;
            $response['message'] = 'This email is already subscribed to our newsletter.';
        } else {
            throw $e;
        }
    }
    
} catch (Exception $e) {
    $response['success'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>
