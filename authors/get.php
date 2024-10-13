<?php
// Include the database connection file
include '../connectDB.php';

// Set the content type to JSON for the response
header('Content-Type:application/json');

// Open a connection to the database
$con = DB::connectToDB();

// Initialize an empty result array
$result = [];

// Check if the 'id' parameter is present in the GET request
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the author data using the provided ID
    $author = DB::getAuthor($id);

    // Check if the author was found
    if (is_null($author)) {
        $result = [
            "status" => 404,
            "message" => "The author id is not found", // Error message
            "data" => null
        ];
    } else {
        // If found, prepare a success response with the author data
        $result = [
            "status" => 200,
            "message" => "success",
            "data" => [
                "id" => $author[0], // author ID
                "name" => $author[1], // author name
                "biography" => $author[2], // author biography
            ],
        ];
    }
} else {
    // If the 'id' parameter is missing, return a 500 error response
    $result = [
        "status" => 500,
        "message" => "The id parameter is not found.", // Error message
        "data" => null
    ];
}

// Encode the result array as JSON
echo json_encode($result);