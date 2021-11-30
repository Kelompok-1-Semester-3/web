<?php

class Auth_model
{
    public $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $fullname = htmlspecialchars($data['fullname']);
        $phone = htmlspecialchars($data['phone']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $fullname = htmlspecialchars($data['fullname']);

        $this->db->query("INSERT INTO user VALUES('', :fullname, :phone, :email, :password, :profile, :role_id)");
        $this->db->bindValue('fullname', $fullname);
        $this->db->bindValue('phone', $phone);
        $this->db->bindValue('email', $email);
        $this->db->bindValue('password', $password);
        $this->db->bindValue('profile', '');
        $this->db->bindValue('role_id', 2);
        $this->db->execute();

        return $this->db->rowCount();
    }

    // get user by email (check)
    public function getUserByEmail($data)
    {
        $email = htmlspecialchars($data);

        $this->db->query('SELECT * FROM user WHERE email=:email');
        $this->db->bindValue('email', $email);
        $this->db->execute();

        return $this->db->rowCount();
    }

    // login
    public function login($data)
    {
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $this->db->query('SELECT * FROM user WHERE email=:email');
        $this->db->bindValue('email', $email);
        $result = $this->db->single();
        if (!empty($result)) {
            if (password_verify($password, $result['password'])) {
                // check role_id 1: place owner 2: user
                if ($result['role_id'] == 1) {
                    return [
                        'role_id' => 1,
                        'data' => $result
                    ];
                } else if ($result['role_id'] == 2) {
                    return [
                        'role_id' => 2,
                        'data' => $result
                    ];
                }
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function getAllUser()
    {
        $this->db->query('SELECT * FROM user');
        return $this->db->resultSet();
    }
}
