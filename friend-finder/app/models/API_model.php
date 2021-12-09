<?php

class API_model
{

    public $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getEventByID($data)
    {
        $this->db->query("SELECT event.`id`, `name_event`, `event_owner`, `contact_person`, `description`, `event_picture`, `category_id`, `event_start_date`, `event_end_date`, `price`, `location`, `created_by`, category.name as 'category' FROM `event`, category WHERE event.id =:id");
        $this->db->bindValue('id', $data);
        return $this->db->single();
    }

    public function getAllUserEvent($data)
    {
        $this->db->query("SELECT event.`id`, `name_event`, `event_owner`, `contact_person`, `description`, `event_picture`, `category_id`, `event_start_date`, `event_end_date`, `price`, `location`, `user`.`fullname` as 'created_by' FROM `event`, user WHERE user.id = event.created_by AND user.id=:data");
        $this->db->bindValue('data', $data);
        return $this->db->resultSet();
    }

    public function getEventByKeyword($data)
    {
        $this->db->query("SELECT event.`id`, `name_event`, `event_owner`, `contact_person`, `description`, `event_picture`, `category_id`, `event_start_date`, `event_end_date`, `price`, `location`, `user`.`fullname` as 'created_by' FROM `event`, user, category WHERE user.id = event.created_by AND event.category_id=category.id AND name_event LIKE :keyword OR location LIKE :keyword");
        $this->db->bindValue('keyword', "%$data%");
        return $this->db->resultSet();
    }
}
