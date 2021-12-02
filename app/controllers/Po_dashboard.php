<?php

class Po_dashboard extends Controller
{
    public function index()
    {
        $data['title'] = 'Place Owner';
        $credential = $_SESSION['account'];
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        $data['place'] = $this->model('Place_model')->getAllPlace();
        $data['categories'] = $this->model('Category_model')->getAllCategory();

        $this->view('po_dashboard/templates/header', $data);
        $this->view('po_dashboard/templates/sidebar');
        $this->view('po_dashboard/index', $data);
        $this->view('po_dashboard/templates/footer');
    }
}
