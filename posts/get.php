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

    // Fetch the post data using the provided ID
    $post = DB::getPost($id);

    // Check if the post was found
    if (is_null($post)) {
        $result = [
            "status" => 404,
            "message" => "The post id is not found", // Error message
            "data" => null
        ];
    } else {
        // If found, prepare a success response with the post data
        $result = [
            "status" => 200,
            "message" => "success",
            "data" => [
                "id" => $post[0], // Post ID
                "body" => $post[2], // Post body
                "date" => $post[3], // Post date
                "title" => $post[4], // Post title
                // "authorName" => $post[6],
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