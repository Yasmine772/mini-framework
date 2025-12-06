<?php

namespace Center\MiniFramework\Core;
use PDO;
use PDOException;

class DataBase
{
    private static ?PDO $pdo = null;

    public static function getConnection(): ?PDO
    {
        //return existing connection if already created
        if (self::$pdo instanceof PDO) {
            return self::$pdo;
        }
        $connection = $_ENV['DB_CONNECTION'] ?? 'mysql';
        $host = $_ENV['DB_HOST'] ?? '127.0.0.1';
        $port = $_ENV['DB_PORT'] ?? '3306';
        $database = $_ENV['DB_DATABASE'] ?? 'default_database';
        $username = $_ENV['DB_USERNAME'] ?? 'root';
        $password = $_ENV['DB_PASSWORD'] ?? '';

        try {
            if ($connection == 'sqlite') {
                $dsn = "sqlite:{$database}";
                self::$pdo = new PDO($dsn);
            }
            else {
                $dsn = "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4";
                self::$pdo = new PDO($dsn, $username, $password,[
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            }
            return self::$pdo;
        } catch (PDOException $e) {
            $logPath = getenv("LOG_PATH") ?: __DIR__ . '/../../storage/logs';
            if (!is_dir($logPath)) {
                @mkdir($logPath, 0777, true);
            }
            $message = '[' . date('Y-m-d H:i:s') . '] Database connection error : ' . $e->getMessage() . PHP_EOL;
            @file_put_contents($logPath . '/error.log', $message, FILE_APPEND);

            if ((getenv('APP_ENV') ?? 'production') === 'development') {
                throw $e;
            }
        }
            throw new PDOException('Database connection failed.');
    }
    /*
     * Run a SELECT query and return all records
     **/
     public static function query(string $sql, array $params = []):array
     {
          $statement = self::getConnection()->prepare($sql);
          $statement->execute($params);
          return $statement->fetchAll();
      }

    /*
     * Run a SELECT query and return single record
     **/
    public static function queryOne(string $sql, array $params = [])
    {
        $statement = self::getConnection()->prepare($sql);
        $statement->execute($params);
        $result = $statement->fetch();
        return $result === false ? null : $result;
    }
    /*
     * Run INSERT/UPDATE/DELETE and return affected rows
     * */
    public static function execute(string $sql, array $params = []): int
    {
        $statement = self::getConnection()->prepare($sql);
        $statement->execute($params);
        return $statement->rowCount();
    }
    /**
     * Get last inserted ID for INSERT
     */
    public static function lastInsertId(): int
    {
        return self::getConnection()->lastInsertId();
    }

}