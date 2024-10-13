<?php

// Include the database connection file
include '../connectDB.php';

// Set the content type to JSON for the response
header('Content-Type:application/json');

// check from connection to the database
try {
    // Connect to the database
    DB::connectToDB();
} catch (Exception $e) {
    // Handle any connection errors
    $result = [
        "status" => 500,
        "message" => "Database connection failed: " . $e->getMessage(), // Error message with exception details
        "data" => null
    ];
    // Output the error response and terminate the script
    echo json_encode($result);
    die();
}

// Initialize an empty result array
$result = [];

// Check if the username and password are provided in the POST request
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // pass username and password  to log in the user
    $user = DB::login($username, $password);

    // Check if the user was found
    if (is_null($user)) {
        // If no user is found, prepare a 404 response
        $result = [
            "status" => 404,
            "message" => "The user is not found",
            "data" => null
        ];
    } else {
        // If user is found
        $result = [
            "status" => 200,
            "message" => "",
            "data" => [
                "Token" => $user[0] // Return the user's token
            ]
        ];
    }
} else {
    // If username or password is not supplied, prepare a 500 error response
    $result = [
        "status" => 500,
        "message" => "The username or password is not supplied",
        "data" => null
    ];
}

// Encode the result array as JSON
echo json_encode($result);