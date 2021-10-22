<?php

class Database
{
    private $hostName = NULL;
    private $dbName = NULL;
    private $username = NULL;
    private $password = NULL;
    private $options = [];

    private $dataSourceName = NULL;

    private $connection = NULL;

    function __construct()
    {
        $this->hostName = 'localhost';
        $this->dbName = 'LocationDeVoitures';
        $this->username = 'root';
        $this->password = '';
        $this->options = ['charset' => 'UTF8'];
    }

    protected function getConnection()
    {
        try {
            $this->dataSourceName = 'mysql:host=' . $this->hostName . ';dbname=' . $this->dbName;
            $this->connection = new PDO($this->dataSourceName, $this->username, $this->password, $this->options);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $this->connection;
        } catch (PDOException $exeption) {
            die('Error : ' . $exeption->getMessage());
        }
    }
}
