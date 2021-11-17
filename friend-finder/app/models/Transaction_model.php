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
        $start = htmlspecialchars($data['start']);
        $end = htmlspecialchars($data['end']);
        $total = htmlspecialchars($data['total']);
        $book_date = htmlspecialchars($data['book_date']);

        $this->db->query("INSERT INTO booking VALUES('', :place_id, :customer_name, :contact_person, :start, :end, :total, :book_date)");

        $this->db->bindValue('place_id', $place_id);
        $this->db->bindValue('customer_name', $customer_name);
        $this->db->bindValue('contact_person', $contact_person);
        $this->db->bindValue('start', $start);
        $this->db->bindValue('end', $end);
        $this->db->bindValue('total', $total);
        $this->db->bindValue('book_date', $book_date);

        $this->db->execute();

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
        $this->db->query('SELECT booking.id, booking.contact_person, place.id as place_id, booking.customer_name, booking.start, booking.end, booking.book_date, place.price, booking.total FROM booking, place WHERE booking.id=:id');
        $this->db->bindValue('id', $id);
        return $this->db->single();
    }

    public function update($data)
    {
        $place_id = htmlspecialchars($data['place_id']);
        $id = htmlspecialchars($data['id']);
        $customer_name = htmlspecialchars($data['customer_name']);
        $contact_person = htmlspecialchars($data['contact_person']);
        $start = htmlspecialchars($data['start']);
        $end = htmlspecialchars($data['end']);
        $total = htmlspecialchars($data['total']);

        $this->db->query('UPDATE booking SET place_id=:place_id, customer_name=:customer_name, contact_person=:contact_person, start=:start, end=:end, total=:total WHERE id=:id');

        $this->db->bindValue('place_id', $place_id);
        $this->db->bindValue('customer_name', $customer_name);
        $this->db->bindValue('contact_person', $contact_person);
        $this->db->bindValue('start', $start);
        $this->db->bindValue('end', $end);
        $this->db->bindValue('total', $total);
        $this->db->bindValue('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllTransactionByPlaceID($id)
    {
        $this->db->query("SELECT booking.id, place.id as 'place_id', booking.customer_name, booking.start, booking.end, booking.book_date FROM booking, place WHERE booking.place_id=:id AND place.id=:id ");
        $this->db->bindValue('id', $id);
        return $this->db->resultSet();
    }
}
