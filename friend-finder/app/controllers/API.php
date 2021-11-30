<?php

class API extends Controller
{
    public function getDataPlace()
    {
        $data['place'] = $this->model('Place_model')->getAllPlace();
        echo json_encode($data['place']);
        die();
    }

    public function getDetailPlace($id)
    {
        $data['place'] = $this->model('Place_model')->getPlaceByID($id);
        echo json_encode($data['place']);
        die();
    }

    public function getAllUser()
    {
        $data["user"] =  $this->model('Auth_model')->getAllUser();
        echo json_encode($data);
        die();
    }

    public function login()
    {
        $response = [];
        $result = $this->model('Auth_model')->login($_POST);
        if (!empty($result)) {
            $response['status'] = 1;
            $response['pesan'] = "Berhasil Login";
        } else {
            $response['status'] = 0;
            $response['pesan'] = "data tidak tersedia";
        }
        echo json_encode($response);
        die();
    }
    public function register()
    {
        $response = [];
        if ($this->model('Auth_model')->getUserByEmail($_POST['email']) > 0) {
            $response['status'] = 1;
            $response['pesan'] = "Data Sudah Ada";
        }
        if ($this->model('Auth_model')->register($_POST) > 0) {
            $response['status'] = 2;
            $response['pesan'] = "Berhasil Register";
        } else {
            $response['status'] = 0;
            $response['pesan'] = "Gagal Register";
        }
        echo json_encode($response);
    }
}
