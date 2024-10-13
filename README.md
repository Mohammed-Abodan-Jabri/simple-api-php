# <h1>Simple API in PHP</h1>

Overview
This project is a simple RESTful API built using pure PHP. It provides core functionalities such as user authentication, post management, and author details retrieval. The API allows clients to interact with a database to fetch posts, manage user sessions, and access author information in a straightforward and efficient manner.

Features
1. User Authentication
A-Login via Form Data:
Allows users to authenticate using their username and password, sent as form data.
Method: POST
URL: /api/users/login_form_data.php
Request Body:
username=<user_name>
password=<user_password>
Response:
200 OK: Returns a token upon successful authentication.
404 Not Found: If the user is not found.
500 Internal Server Error: If username or password is not supplied.

B-Login via JSON:
Allows users to authenticate using JSON payload.
URL: /api/users/login_json.php
Request Body (JSON):
{
  "username": "user@example.com",
  "password": "your_password"
}
Response:
200 OK: Returns a token upon successful authentication.
400 Bad Request: If the JSON format is invalid.
404 Not Found: If the user is not found.
500 Internal Server Error: If username or password is not supplied.

===========================================================================================  
2. Post Management
-Retrieve All Posts:
Method: GET
GET /api/posts
Response:
200 OK: Returns a json of all posts.
404 Not Found: If no posts are found.
- Retrieve a Specific Post:
Method: GET
URL: /api/posts/get.php?id={id}
Request Parameters:
id (integer): The unique identifier of the post.
Response:
200 OK: Returns the specified post details.
404 Not Found: If the post ID does not exist.
500 Internal Server Error: If ID the  is not supplied
==================================================

3. Author Management
*Retrieve All Authors:
Method: GET
URL: /api/authors
Response:
200 OK: Returns a JSON array of authors.
404 Not Found: If no authors are found.
*Retrieve a Specific Author:
Method: GET
URL: /api/authors/get.php?id={id}
Request Parameters:
id (integer): The unique identifier of the author.
Response:
200 OK: Returns the specified author details.
404 Not Found: If the author is not found.
500 Internal Server Error: If the ID is not supplied
=======================================================
Technology Stack
Language: PHP (pure)
Database: MySQL (or any preferred database)
