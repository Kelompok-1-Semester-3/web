<?php

class Events_model
{
    public $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getNumberOfActivity()
    {
        $this->db->query('SELECT count(id) as total FROM `event` ');
        return $this->db->single();
    }

    public function getSelfEvent($id)
    {
        $this->db->query('SELECT COUNT(id) as total FROM event WHERE created_by=:id');
        $this->db->bindValue('id', $id);
        return $this->db->single();
    }

    public function getAllEvents()
    {
        $events = $this->db->query('SELECT * FROM event');
        return $this->db->resultSet();
    }

    public function getEventByID($data)
    {
        $this->db->query('SELECT * FROM event WHERE id=:id');
        $this->db->bindValue('id', $data);
        return $this->db->single();
    }

    public function store($data)
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

    public function getAllEventUser($data)
    {
        $this->db->query('SELECT * FROM event WHERE created_by=:created_by');
        $this->db->bindValue('created_by', $data);
        return $this->db->resultSet();
    }


    public function update($data)
    {
        // echo json_encode($data);
        // die();
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
        $id = htmlspecialchars($data['id']);

        $this->db->query("UPDATE event SET name_event=:name_event, event_owner=:event_owner, contact_person=:contact_person, description=:description, event_picture=:event_picture, category_id=:category_id, event_start_date=:event_start_date, event_end_date=:event_end_date, price=:price, location=:location WHERE id=:id");

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
        $this->db->bindValue('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $this->db->query('DELETE FROM event WHERE id=:id');
        $this->db->bindValue('id', $data);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getEventByCategory($data)
    {
        $this->db->query('SELECT * FROM event, category WHERE event.category_id=:category_id AND category.id=:id');
        $this->db->bindValue('category_id', $data);
        $this->db->bindValue('id', $data);
        return $this->db->resultSet();
    }

    public function getEventByKeyword($data)
    {
        $keyword = $data;
        $this->db->query('SELECT * FROM event, category WHERE name_event LIKE :name_event LIMIT 1');
        $this->db->bindValue('name_event', "%$keyword%");
        return $this->db->resultSet();
    }
}
