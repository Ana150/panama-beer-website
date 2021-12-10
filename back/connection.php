<?php
class Connection
{
    private $_dbHostName = '127.0.0.1';
    private $_dbName = 'panamaBeer';
    private $_dbuserName = 'root';
    private $_dbPassword = 'bcd127';
    private $_connection;

    public function __construct()
    {
        try {
            $this->_connection = new PDO(
                "mysql:host=$this->_dbHostName;dbname=$this->_dbName;",
                $this->_dbuserName,
                $this->_dbPassword
            );

            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }

    public function returnConnection()
    {
        return $this->_connection;
    }
}