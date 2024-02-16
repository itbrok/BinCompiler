<?php

class ApiController {
    private $apiUrl = 'https://api.pastecode.io/anon/raw-snippet/';

    // Method to handle GET requests for fetching code from Pastebin
    public function handlePastebinCode($codeId) {
        // Check if $config array is defined
        if (!isset($config)) {
            // Include config.php if $config array is not defined
            include 'app/config.php';
        }
        
        // Construct the Pastecode URL
        $pastecodeUrl = $this->apiUrl . $codeId . '?raw=inline&api=true&ticket=' . urlencode($config['pastecode_ticket']);

        // Fetch code from Pastecode
        $code = file_get_contents($pastecodeUrl);

        // Check if code retrieval was successful
        if ($code !== false) {
            return $code; // Return the fetched code
        } else {
            // Error handling if code retrieval fails
            return "Error: Unable to fetch code from Pastecode.";
        }
    }

    // Add other methods to handle different API endpoints and operations as needed
}

?>
