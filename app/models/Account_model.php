<?php

class Account_model
{
    public $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAccountByID($id)
    {
        $this->db->query('SELECT * FROM user WHERE id=:id');
        $this->db->bindValue('id', $id);
        return $this->db->single();
    }

    public function update($data)
    {
        $id = htmlspecialchars($data['id']);
        $profile = htmlspecialchars($data['profile']);
        $fullname = htmlspecialchars($data['fullname']);
        $phone = htmlspecialchars($data['phone']);
        $email = htmlspecialchars($data['email']);

        $this->db->query('UPDATE user SET profile=:profile, fullname=:fullname, phone=:phone, email=:email WHERE id=:id');
        $this->db->bindValue('profile', $profile);
        $this->db->bindValue('fullname', $fullname);
        $this->db->bindValue('phone', $phone);
        $this->db->bindValue('email', $email);
        $this->db->bindValue('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
