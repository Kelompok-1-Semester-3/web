<?php

class Category_model
{
    public $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllCategory()
    {
        $this->db->query('SELECT * FROM category');
        return $this->db->resultSet();
    }

    public function getCategoryByID($data)
    {
        $this->db->query('SELECT * FROM category WHERE id=:id');
        $this->db->bindValue('id', $data);
        return $this->db->single();
    }
}
