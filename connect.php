<?php
session_start(); // เรียกใช้ session
error_reporting(0); // E_ALL
date_default_timezone_set('Asia/Bangkok'); // Time Zone


class DB
{
    private static $DB_HOST = 'localhost';
    private static $DB_USERNAME = 'root';
    private static $DB_PASSWORD = '';
    private static $DB_NAME = 'cmuvcdb';

    private static $connect = null;
    private static $response = true;

    public static function connect()
    {
        try {
            self::$connect = new PDO(
                'mysql:host=' . self::$DB_HOST . ';
                                    dbname=' . self::$DB_NAME . ';
                                    charset=utf8',
                self::$DB_USERNAME,
                self::$DB_PASSWORD
            );
            self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return self::$connect;
        } catch (PDOException $e) {
            echo "Database could not be connected: " . $e->getMessage();
            exit();
        }
    }
    public static function getConnection()
    {
        return self::connect();
    }
    public static function getResponse()
    {
        return self::$response;
    }
    public static function query($query = null, $params = array())
    {
        if (self::$connect instanceof PDO) {
            try {
                $statement = self::$connect->prepare($query);
                $statement->execute($params);
                $command = strtoupper(explode(' ', $query)[0]);
                if ($command === 'SELECT') {
                    self::$response = $statement->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    self::$response = $statement->rowCount();
                }
                return self::$response;
            } catch (Throwable $e) {
                http_response_code(500);
                echo "การประมวลผลข้อมูลล้มเหลว: " . $e->getMessage();
                exit();
            }
        } else {
            http_response_code(500);
            echo "โปรดเปิดการเชื่อมต่อฐานข้อมูล";
            exit();
        }
    }
}
DB::connect();
