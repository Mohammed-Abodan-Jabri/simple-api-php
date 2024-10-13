<?php

include '../connectDB.php';
header('Content-Type: application/json');

// Connect to the database
DB::connectToDB();

// Initialize response array
$response = [];

// Get the raw JSON data from the request body
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

// Check if JSON is valid
if (json_last_error() !== JSON_ERROR_NONE) {
    $response = [
        "status" => 400,
        "message" => "Invalid JSON format",
        "data" => null
    ];
    echo json_encode($response);
    exit;
}

// Ensure username and password are provided
if (!isset($data["username"]) || !isset($data["password"])) {
    $response = [
        "status" => 400,
        "message" => "Username or password not provided",
        "data" => null
    ];
    echo json_encode($response);
    exit;
}

// Extract the username and password
$username = $data["username"];
$password = $data["password"];

// Attempt to log in the user
$user = DB::login($username, $password);

// Check if user exists
if (is_null($user)) {
    $response = [
        "status" => 404,
        "message" => "User not found",
        "data" => null
    ];
} else {
    $response = [
        "status" => 200,
        "message" => "Login successful",
        "data" => [
            "Token" => $user[0]
        ]
    ];
}

// Return the JSON-encoded response
echo json_encode($response);

