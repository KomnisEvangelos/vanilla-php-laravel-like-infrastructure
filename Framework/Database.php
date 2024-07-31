<?php

namespace Framework;

use PDO;
use PDOException;
use Exception;

class Database
{
    public $connection;

    /**
     * 
     * Constructor for Database class
     * 
     * @param array $config
     * 
     */
    public function __construct($config)
    {
        $dns = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->connection = new PDO($dns, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }

    /**
     * Query the database
     * 
     * @param string $query
     * @return PDOstatement
     * @throws PDOException
     * 
     */
    public function query($query, $params = [])
    {
        try {
            $sth = $this->connection->prepare($query);
            foreach ($params as $param => $value) {
                $sth->bindValue(':' . $param, $value);
            }
            $sth->execute();
            return $sth;
        } catch (PDOException $e) {
            throw new Exception("Query failed to execute: {$e->getMessage()}");
        }
    }
}
