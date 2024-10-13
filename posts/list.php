<?php
// Include the database connection file
include '../connectDB.php';

// Set the content type to JSON for the response
header('Content-Type:application/json');

// Establish a connection to the database
DB::connectToDB();

// Retrieve all posts from the database
$posts = DB::getPosts();

// Initialize an empty result array to keep results
$result = [];

// Check if the posts were retrieved successfully
if (is_null($posts)) {
    // If no posts are found
    $result = [
        "status" => 404,
        "message" => "The post id is not found", // Error message indicating no posts were found
        "data" => null
    ];
} else {
    // If posts are found
    $result = [
        "status" => 200,
        "message" => "",
        "data" => $posts
    ];
}
// Encode the result array as JSON and
echo json_encode($result);