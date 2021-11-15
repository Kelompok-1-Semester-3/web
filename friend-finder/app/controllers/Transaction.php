<?php

class Transaction extends Controller
{
    public function index()
    {
        $data['title'] = 'Transaction';
        $data['title'] = 'Place Owner';
        $credential = $_SESSION['account'];
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        $data['transaction'] = $this->model('Transaction_model')->getAllTransaction();

        $this->view('po_dashboard/templates/header', $data);
        $this->view('po_dashboard/templates/sidebar');
        $this->view('transaction/index', $data);
        $this->view('po_dashboard/templates/footer');
    }

    public function insert()
    {
        $_POST['book_date'] = date('Y-m-d');
        $_POST['total'] = $_POST['price'] * $_POST['time_estimates'];
        // echo json_encode($_POST);
        // die();
        if ($this->model('Transaction_model')->addNewTransaction($_POST)) {
            Flasher::setFlash('Success', 'Add New Transaction Successfully', 'success');
            echo "
                <script>window.history.back()</script>
            ";
        } else {
            Flasher::setFlash('Faileds', 'Add New Transaction Failed', 'danger');
            echo "
                <script>window.history.back()</script>
            ";
        }
    }

    public function delete($id)
    {

        $transaction = $this->model('Transaction_model')->getTransactionByID($id);
        $this->model('Transaction_model')->updateStatusPlace($transaction['place_id'], 'available');

        if ($this->model('Transaction_model')->destroy($id)) {
            Flasher::setFlash('Success', 'Delete Transaction Successfully', 'success');
            echo "
                <script>window.history.back()</script>
            ";
        } else {
            Flasher::setFlash('Faileds', 'Delete Transaction Failed', 'danger');
            echo "
                <script>window.history.back()</script>
            ";
        }
    }

    public function getSingleTransaction()
    {
        echo json_encode($this->model('Transaction_model')->getTransactionByID($_POST['id']));
    }

    public function edit()
    {
        if ($this->model('Transaction_model')->update($_POST)) {
            Flasher::setFlash('Success', 'Delete Transaction Successfully', 'success');
            echo "
                <script>window.history.back()</script>
            ";
        } else {
            Flasher::setFlash('Faileds', 'Delete Transaction Failed', 'danger');
            echo "
                <script>window.history.back()</script>
            ";
        }
    }

    public function invoice($id)
    {
        $data['title'] = 'Transaction';
        $data['title'] = 'Place Owner';
        $credential = $_SESSION['account'];
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        $data['transaction'] = $this->model('Transaction_model')->getTransactionByID($id);

        $this->view('po_dashboard/templates/header', $data);
        $this->view('po_dashboard/templates/sidebar');
        $this->view('transaction/invoice', $data);
        $this->view('po_dashboard/templates/footer');
    }
}
