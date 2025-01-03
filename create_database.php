<?php
// config.php
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_PORT', 3306);

class DatabaseCreator
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . DB_HOST . ';port=' . DB_PORT,
                DB_USER,
                DB_PASSWORD
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function createDatabaseAndTable(): void
    {
        $dbName = 'users'; // Fixed database name
        try {
            // Drop and recreate database
            $this->pdo->exec("DROP DATABASE IF EXISTS `$dbName`");
            $this->pdo->exec("CREATE DATABASE `$dbName`");
            echo "Database `$dbName` created successfully.\n";

            // Use the database
            $this->pdo->exec("USE `$dbName`");

            // Drop and recreate `users` table
            $this->pdo->exec("DROP TABLE IF EXISTS users");
            $this->pdo->exec("
                CREATE TABLE users (
                    user_id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(50) NOT NULL,
                    email VARCHAR(50) UNIQUE NOT NULL,
                    password VARCHAR(5000) NOT NULL
                )
            ");
            echo "Table `users` created successfully in database `$dbName`.\n";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Usage
$creator = new DatabaseCreator();
$creator->createDatabaseAndTable();
?>
