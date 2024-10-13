# simple-api-php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple API in PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        h1, h2, h3 {
            color: #2c3e50;
        }
        pre, code {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
        blockquote {
            background-color: #f9f9f9;
            padding: 10px 20px;
            border-left: 5px solid #3498db;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <h1>Simple API in PHP</h1>

    <h2>Project Overview</h2>
    <p>This project is a simple RESTful API built using pure PHP. It provides core functionalities such as user authentication, post management, and author details retrieval. The API allows clients to interact with a database to fetch posts, manage user sessions, and access author information in a straightforward and efficient manner.</p>

    <h2>Features</h2>

    <h3>1. User Authentication</h3>

    <h4>A. Login via Form Data</h4>
    <p>Allows users to authenticate using their username and password, sent as form data.</p>
    <ul>
        <li><strong>Method</strong>: <code>POST</code></li>
        <li><strong>URL</strong>: <code>/api/users/login_form_data.php</code></li>
    </ul>
    <p><strong>Request Body</strong>:</p>
    <pre><code>username=&lt;user_name&gt;
password=&lt;user_password&gt;</code></pre>
    <p><strong>Response</strong>:</p>
    <ul>
        <li><code>200 OK</code>: Returns a token upon successful authentication.</li>
        <li><code>404 Not Found</code>: If the user is not found.</li>
        <li><code>500 Internal Server Error</code>: If username or password is not supplied.</li>
    </ul>

    <h4>B. Login via JSON</h4>
    <p>Allows users to authenticate using a JSON payload.</p>
    <ul>
        <li><strong>Method</strong>: <code>POST</code></li>
        <li><strong>URL</strong>: <code>/api/users/login_json.php</code></li>
    </ul>
    <p><strong>Request Body</strong> (JSON):</p>
    <pre><code>{
  "username": "user@example.com",
  "password": "your_password"
}</code></pre>
    <p><strong>Response</strong>:</p>
    <ul>
        <li><code>200 OK</code>: Returns a token upon successful authentication.</li>
        <li><code>400 Bad Request</code>: If the JSON format is invalid.</li>
        <li><code>404 Not Found</code>: If the user is not found.</li>
        <li><code>500 Internal Server Error</code>: If username or password is not supplied.</li>
    </ul>

    <h3>2. Post Management</h3>

    <h4>A. Retrieve All Posts</h4>
    <p>Fetches all the posts stored in the database.</p>
    <ul>
        <li><strong>Method</strong>: <code>GET</code></li>
        <li><strong>URL</strong>: <code>/api/posts</code></li>
    </ul>
    <p><strong>Response</strong>:</p>
    <ul>
        <li><code>200 OK</code>: Returns a JSON array of all posts.</li>
        <li><code>404 Not Found</code>: If no posts are available.</li>
    </ul>

    <h4>B. Retrieve a Specific Post</h4>
    <p>Fetches a single post using its unique ID.</p>
    <ul>
        <li><strong>Method</strong>: <code>GET</code></li>
        <li><strong>URL</strong>: <code>/api/posts/get.php?id={id}</code></li>
        <li><strong>Request Parameters</strong>:</li>
        <ul>
            <li><code>id</code> (integer): The unique identifier of the post.</li>
        </ul>
    </ul>
    <p><strong>Response</strong>:</p>
    <ul>
        <li><code>200 OK</code>: Returns the specified post details.</li>
        <li><code>404 Not Found</code>: If the post is not found.</li>
        <li><code>500 Internal Server Error</code>: If the ID is not supplied.</li>
    </ul>

    <h3>3. Author Management</h3>

    <h4>A. Retrieve All Authors</h4>
    <p>Fetches all authors associated with posts.</p>
    <ul>
        <li><strong>Method</strong>: <code>GET</code></li>
        <li><strong>URL</strong>: <code>/api/authors</code></li>
    </ul>
    <p><strong>Response</strong>:</p>
    <ul>
        <li><code>200 OK</code>: Returns a JSON array of authors.</li>
        <li><code>404 Not Found</code>: If no authors are found.</li>
    </ul>

    <h4>B. Retrieve a Specific Author</h4>
    <p>Fetches details of a specific author using their unique ID.</p>
    <ul>
        <li><strong>Method</strong>: <code>GET</code></li>
        <li><strong>URL</strong>: <code>/api/authors/get.php?id={id}</code></li>
        <li><strong>Request Parameters</strong>:</li>
        <ul>
            <li><code>id</code> (integer): The unique identifier of the author.</li>
        </ul>
    </ul>
    <p><strong>Response</strong>:</p>
    <ul>
        <li><code>200 OK</code>: Returns the specified author details.</li>
        <li><code>404 Not Found</code>: If the author is not found.</li>
        <li><code>500 Internal Server Error</code>: If the ID is not supplied.</li>
    </ul>

    <hr>

    <h2>Technology Stack</h2>
    <ul>
        <li><strong>Language</strong>: PHP (pure)</li>
        <li><strong>Database</strong>: MySQL (or any preferred database)</li>
        <li><strong>Framework</strong>: None (pure PHP implementation)</li>
    </ul>

    <hr>

    <h2>Example Responses</h2>

    <h4>Successful Login</h4>
    <pre><code>{
  "token": "abcdef1234567890",
  "message": "Login successful"
}</code></pre>

    <h4>Retrieve Post Example</h4>
    <pre><code>{
  "id": 123,
  "title": "My First Blog Post",
  "content": "This is the content of my first blog post.",
  "author": "John Doe",
  "created_at": "2024-01-01T12:00:00Z",
  "updated_at": "2024-01-01T13:00:00Z"
}</code></pre>

    <h4>Error Response (Post Not Found)</h4>
    <pre><code>{
  "error": true,
  "message": "Post not found"
}</code></pre>

</body>
</html>

