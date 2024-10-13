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

}

