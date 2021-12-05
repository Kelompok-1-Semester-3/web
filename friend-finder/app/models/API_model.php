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
        $this->db->query("SELECT event.`id`, `name_event`, `event_owner`, `contact_person`, `description`, `event_picture`, `category_id`, `event_start_date`, `event_end_date`, `price`, `location`, `created_by`, category.name as 'category' FROM `event`, category WHERE id =:id ");
        $this->db->bindValue('id', $data);

        return $this->db->single();
    }
}
