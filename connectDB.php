<?php

// Class to deal with DB
class DB
{
    private const  SERVER_NAME = 'localhost';
    private const USRE_NAME = 'root';
    private const PASSWORD = '';
    private const DATABASE_NAME = 'blog-oop';
    public static Mysqli $connect;

    public static function connectToDB(): mysqli
    {
        self::$connect = new mysqli(self::SERVER_NAME, self::USRE_NAME, self::PASSWORD, self::DATABASE_NAME);
        if (self::$connect->connect_error) {
            throw new Exception("Connection failed: " . self::$connect->connect_error);
        } else return self::$connect;
    }
    public static function closeConnect()
    {
        $isClosed = self::$connect->close();
        if ($isClosed) {
            echo "connection was successfully closed. <br>";
        } else {
            throw new Exception('Failed to close connected to DB');
        }
    }

    // getPost=> return determine post Depending on the ID passed
    public static function getPost(int $id)
    {
        $sql = "SELECT * FROM posts WHERE id=$id";
        $result = self::$connect->query($sql);
        $post = $result->fetch_row();
        return $post;
    }

    // getPosts=> return list of posts
    public static function getPosts()
    {
        $sql = "SELECT * FROM posts";
        $result = self::$connect->query($sql);
        $posts = [];
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
        return $posts;

    }

    // getAuthor=> return ِِAuthor name for specific post
    public static function getAuthorByPostId(int $id)
    {
        $sql = "SELECT posts.*, authors.name AS author_name 
                FROM posts, authors
                WHERE posts.autherId = authors.id 
                AND posts.id =$id";
        $result = self::$connect->query($sql);
        return $result->fetch_row();
    }
    // getAuthor=> return determine Author Depending on the ID passed
    public static function getAuthor(int $id)
    {
        $sql = "SELECT authors.* FROM  authors
                WHERE  authors.id=$id";
        $result = self::$connect->query($sql);
        return $result->fetch_row();
    }
    public static function getAuthors()
    {
        $sql = "SELECT * FROM authors";
        $result = self::$connect->query($sql);
        $authors = [];
        while ($row = $result->fetch_assoc()) {
            $authors[] = $row;
        }
        return $authors;
    }

    // getPostsAuthor=> return all post for   specific Author
    public static function getPostsAuthor(int $id)
    {
        // $id ==> Author_Id
        $sql = "SELECT posts.*, authors.name AS author_name 
                FROM posts, authors
                WHERE posts.autherId = authors.id 
                AND posts.autherId =$id";
        $result = self::$connect->query($sql);
        $posts = [];
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
        return $posts;
    }

    public static function login($username, $password)
    {
        $sql = "SELECT token FROM `users` WHERE username='".$username."' and password=$password ";
        $result = self::$connect->query($sql);
        $auth= $result->fetch_row();
        if (is_null($auth)) {
            return null;
        } else {
            return $auth;
        }
    }

}

