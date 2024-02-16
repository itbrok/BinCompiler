<?php
// Include necessary files
require_once 'app/config.php';
require_once 'app/controllers/ApiController.php';

// Initialize API controller
$apiController = new ApiController();

// Route the request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['code'])) {
        echo $apiController->handlePastebinCode($_GET['code']);
    } else {
        // Serve frontend HTML page
        include 'public/index.html';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle API requests
    if (@$_POST['endpoint'] === 'pastebin') {
        // Example: Handle POST request for Pastebin
        $responseData = $apiController->handlePastebinCode($_POST['data']);
        echo json_encode($responseData);
    } else {
        // Handle other POST requests
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Method not allowed"));
}
?>
