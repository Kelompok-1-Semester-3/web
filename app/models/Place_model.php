<?php

class Place_model
{
    public $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function addNewPlace($data)
    {
        $place_name = htmlspecialchars($data['place_name']);
        $place_owner = htmlspecialchars($data['place_owner']);
        $price = htmlspecialchars($data['price']);
        $location = htmlspecialchars($data['location']);
        $description = htmlspecialchars($data['description']);
        $place_open_time = htmlspecialchars($data['place_open_time']);
        $place_close_time = htmlspecialchars($data['place_close_time']);
        $place_picture = htmlspecialchars($data['place_picture']);
        $created_at = htmlspecialchars($data['created_at']);
        $category_id = htmlspecialchars($data['category_id']);
        $contact_person = htmlspecialchars($data['contact_person']);

        $this->db->query("INSERT INTO place VALUES ('', :place_name, :place_owner, :price, :location, :description, :created_at, :place_picture, :place_open_time, :place_close_time, :status, :category_id, :contact_person)");

        $this->db->bindValue('place_name', $place_name);
        $this->db->bindValue('place_owner', $place_owner);
        $this->db->bindValue('price', $price);
        $this->db->bindValue('location', $location);
        $this->db->bindValue('description', $description);
        $this->db->bindValue('created_at', $created_at);
        $this->db->bindValue('place_picture', $place_picture);
        $this->db->bindValue('place_open_time', $place_open_time);
        $this->db->bindValue('place_close_time', $place_close_time);
        $this->db->bindValue('status', 'available');
        $this->db->bindValue('category_id', $category_id);
        $this->db->bindValue('contact_person', $contact_person);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDataPlace()
    {
        $this->db->query("SELECT place.`id`, `place_name`, `place_owner`, `price`, `location`, `description`, `created_at`, `place_picture`, `place_open_time`, `place_close_time`, `status`, `category_id`, `contact_person`, category.name as 'category' FROM `place`, category WHERE place.category_id = category.id");
        return $this->db->resultSet();
    }

    public function getAllPlace()
    {
        $this->db->query('SELECT * FROM place');
        return $this->db->resultSet();
    }

    public function getPlaceByID($id)
    {
        $this->db->query('SELECT * FROM place WHERE id=:id');
        $this->db->bindValue('id', $id);
        return $this->db->single();
    }

    public function update($data)
    {
        $place_name = htmlspecialchars($data['place_name']);
        $place_owner = htmlspecialchars($data['place_owner']);
        $price = htmlspecialchars($data['price']);
        $location = htmlspecialchars($data['location']);
        $description = htmlspecialchars($data['description']);
        $place_open_time = htmlspecialchars($data['place_open_time']);
        $place_close_time = htmlspecialchars($data['place_close_time']);
        $place_picture = htmlspecialchars($data['place_picture']);
        $created_at = htmlspecialchars($data['created_at']);
        $status = htmlspecialchars($data['status']);
        $category_id = htmlspecialchars($data['category_id']);
        $contact_person = htmlspecialchars($data['contact_person']);
        $id = htmlspecialchars($data['id']);

        $this->db->query('UPDATE place SET place_name=:place_name,place_owner=:place_owner,price=:price,location=:location,description=:description,created_at=:created_at,place_picture=:place_picture,place_open_time=:place_open_time,place_close_time=:place_close_time,status=:status,category_id=:category_id,contact_person=:contact_person WHERE id=:id');

        $this->db->bindValue('place_name', $place_name);
        $this->db->bindValue('place_owner', $place_owner);
        $this->db->bindValue('price', $price);
        $this->db->bindValue('location', $location);
        $this->db->bindValue('description', $description);
        $this->db->bindValue('created_at', $created_at);
        $this->db->bindValue('place_picture', $place_picture);
        $this->db->bindValue('place_open_time', $place_open_time);
        $this->db->bindValue('place_close_time', $place_close_time);
        $this->db->bindValue('status', $status);
        $this->db->bindValue('category_id', $category_id);
        $this->db->bindValue('contact_person', $contact_person);
        $this->db->bindValue('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $this->db->query('DELETE FROM place WHERE id=:id');
        $this->db->bindValue('id', $data);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
