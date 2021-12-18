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
        $this->db->query("SELECT event.`id`, `name_event`, `event_owner`, `contact_person`, `description`, `event_picture`, `category_id`, `event_start_date`, `event_end_date`, `price`, `location`, `created_by`, category.name as 'category' FROM `event`, category WHERE event.id=:id");
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

    public function getAllCategories()
    {
        $this->db->query("SELECT * FROM category");
        return $this->db->resultSet();
    }

    public function addNewEvent()
    {
        $name_event = htmlspecialchars($data['name_event']);
        $event_owner = htmlspecialchars($data['event_owner']);
        $contact_person = htmlspecialchars($data['contact_person']);
        $description = htmlspecialchars($data['description']);
        $event_picture = htmlspecialchars($data['event_picture']);
        $category_id = htmlspecialchars($data['category_id']);
        $event_start_date = htmlspecialchars($data['event_start_date']);
        $event_end_date = htmlspecialchars($data['event_end_date']);
        $price = htmlspecialchars($data['price']);
        $location = htmlspecialchars($data['location']);
        $created_by = htmlspecialchars($data['created_by']);

        $this->db->query('INSERT INTO event VALUES("", :name_event, :event_owner, :contact_person, :description, :event_picture, :category_id, :event_start_date, :event_end_date, :price, :location, :created_by)');

        $this->db->bindValue('name_event', $name_event);
        $this->db->bindValue('event_owner', $event_owner);
        $this->db->bindValue('contact_person', $contact_person);
        $this->db->bindValue('description', $description);
        $this->db->bindValue('event_picture', $event_picture);
        $this->db->bindValue('category_id', $category_id);
        $this->db->bindValue('event_start_date', $event_start_date);
        $this->db->bindValue('event_end_date', $event_end_date);
        $this->db->bindValue('price', $price);
        $this->db->bindValue('location', $location);
        $this->db->bindValue('created_by', $created_by);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editEvent()
    {
        $name_event = htmlspecialchars($data['name_event']);
        $id = htmlspecialchars($data['id']);
        $event_owner = htmlspecialchars($data['event_owner']);
        $contact_person = htmlspecialchars($data['contact_person']);
        $description = htmlspecialchars($data['description']);
        $event_picture = htmlspecialchars($data['event_picture']);
        $category_id = htmlspecialchars($data['category_id']);
        $event_start_date = htmlspecialchars($data['event_start_date']);
        $event_end_date = htmlspecialchars($data['event_end_date']);
        $price = htmlspecialchars($data['price']);
        $location = htmlspecialchars($data['location']);
        $created_by = htmlspecialchars($data['created_by']);

        $this->db->query('UPDATE event SET name_event=:name_event, event_owner=:event_owner, contact_person:contact_person, description=:description, event_picture=:event_picture, category_id=:category_id, event_start_date=:event_start_date, event_end_date=:event_end_date, price=:price, location=:location, created_by=:created_by WHERE id=:id');

        $this->db->bindValue('name_event', $name_event);
        $this->db->bindValue('event_owner', $event_owner);
        $this->db->bindValue('contact_person', $contact_person);
        $this->db->bindValue('description', $description);
        $this->db->bindValue('event_picture', $event_picture);
        $this->db->bindValue('category_id', $category_id);
        $this->db->bindValue('event_start_date', $event_start_date);
        $this->db->bindValue('event_end_date', $event_end_date);
        $this->db->bindValue('price', $price);
        $this->db->bindValue('location', $location);
        $this->db->bindValue('created_by', $created_by);
        $this->db->bindValue('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDetailAccount($id)
    {
        $this->db->query('SELECT * FROM user WHERE id=:id');
        $this->db->bindValue('id', $id);
        $this->db->execute();
        return $this->db->single();
    }
}
