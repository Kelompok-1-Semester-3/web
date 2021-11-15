<?php

class Transaction_model
{
    public $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function updateStatusPlace($id, $status)
    {
        $this->db->query('UPDATE place SET status=:status WHERE id=:id');
        $this->db->bindValue('id', $id);
        $this->db->bindValue('status', $status);
        $this->db->execute();
    }

    public function addNewTransaction($data)
    {
        $place_id = htmlspecialchars($data['place_id']);
        $customer_name = htmlspecialchars($data['customer_name']);
        $contact_person = htmlspecialchars($data['contact_person']);
        $start_date = htmlspecialchars($data['start_date']);
        $end_date = htmlspecialchars($data['end_date']);
        $time_estimates = htmlspecialchars($data['time_estimates']);
        $price = htmlspecialchars($data['price']);
        $total = htmlspecialchars($data['total']);
        $play_time = htmlspecialchars($data['play_time']);
        $book_date = htmlspecialchars($data['book_date']);

        $this->db->query('INSERT INTO booking VALUES(id, :place_id, :customer_name, :contact_person, :start_date, :end_date, :time_estimates, :price, :total, :play_time, :book_date)');

        $this->db->bindValue('place_id', $place_id);
        $this->db->bindValue('customer_name', $customer_name);
        $this->db->bindValue('contact_person', $contact_person);
        $this->db->bindValue('start_date', $start_date);
        $this->db->bindValue('end_date', $end_date);
        $this->db->bindValue('time_estimates', $time_estimates);
        $this->db->bindValue('price', $price);
        $this->db->bindValue('total', $total);
        $this->db->bindValue('play_time', $play_time);
        $this->db->bindValue('book_date', $book_date);

        $this->db->execute();
        $this->updateStatusPlace($place_id, 'not available');
        return $this->db->rowCount();
    }

    public function getAllTransaction()
    {
        $this->db->query('SELECT * FROM booking');
        return $this->db->resultSet();
    }

    public function destroy($id)
    {
        $this->db->query('DELETE FROM booking WHERE id=:id');
        $this->db->bindValue('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getTransactionByID($id)
    {
        $this->db->query('SELECT * FROM booking WHERE id=:id');
        $this->db->bindValue('id', $id);
        return $this->db->single();
    }

    public function update($data)
    {
        $place_id = htmlspecialchars($data['place_id']);
        $id = htmlspecialchars($data['id']);
        $customer_name = htmlspecialchars($data['customer_name']);
        $contact_person = htmlspecialchars($data['contact_person']);
        $start_date = htmlspecialchars($data['start_date']);
        $end_date = htmlspecialchars($data['end_date']);
        $time_estimates = htmlspecialchars($data['time_estimates']);
        $price = htmlspecialchars($data['price']);
        $total = htmlspecialchars($data['total']);
        $play_time = htmlspecialchars($data['play_time']);

        $this->db->query('UPDATE booking SET place_id=:place_id, customer_name=:customer_name, contact_person=:contact_person, start_date=:start_date, end_date=:end_date, time_estimates=:time_estimates, price=:price, total=:total, play_time=:play_time WHERE id=:id');

        $this->db->bindValue('place_id', $place_id);
        $this->db->bindValue('customer_name', $customer_name);
        $this->db->bindValue('contact_person', $contact_person);
        $this->db->bindValue('start_date', $start_date);
        $this->db->bindValue('end_date', $end_date);
        $this->db->bindValue('time_estimates', $time_estimates);
        $this->db->bindValue('price', $price);
        $this->db->bindValue('total', $total);
        $this->db->bindValue('play_time', $play_time);
        $this->db->bindValue('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
