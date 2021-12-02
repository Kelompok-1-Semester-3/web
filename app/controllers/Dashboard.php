<?php

class Dashboard extends Controller
{
    public function index()
    {
        $credential = $_SESSION['account'];
        // var_dump($credential);
        // die();
        $data['title'] = 'Admin Dashboard';
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        $data['categories'] = $this->model('Category_model')->getAllCategory();
        $data['events'] = $this->model('Events_model')->getAllEventUser($credential['id']);

        // badges data
        $data['total_event'] = $this->model('Events_model')->getNumberOfActivity();
        $data['self_event'] = $this->model('Events_model')->getSelfEvent($credential['id']);


        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
