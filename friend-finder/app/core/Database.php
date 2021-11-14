<?php

class Database
{
    // database property
    private $dbh, $stat;

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=localhost;dbname=dbfriend-finder';
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new PDO($dsn, 'root', '', $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stat = $this->dbh->prepare($query);
    }

    public function bindValue($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stat->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stat->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stat->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stat->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stat->rowCount();
    }
}
