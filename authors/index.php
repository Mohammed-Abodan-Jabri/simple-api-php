<?php
// Include the database connection file
include '../connectDB.php';

// Set the content type to JSON for the response
header('Content-Type:application/json');

// Establish a connection to the database
DB::connectToDB();

// Retrieve all authors from the database
$authors = DB::getAuthors();

// Initialize an empty result array to keep results
$result = [];

// Check if the authors were retrieved successfully
if (is_null($authors)) {
    // If no authors are found
    $result = [
        "status" => 404,
        "message" => "The post id is not found", // Error message indicating no authors were found
        "data" => null
    ];
} else {
    // If authors are found
    $result = [
        "status" => 200,
        "message" => "",
        "data" => $authors
    ];
}
// Encode the result array as JSON and
echo json_encode($result);