<?php

class API extends Controller
{
    public function getDataPlace()
    {
        $data['place'] = $this->model('Place_model')->getDataPlace();
        echo json_encode($data['place']);
        die();
    }

    public function getDetailPlace($id)
    {
        $data['place'] = $this->model('Place_model')->getPlaceByID($id);
        echo json_encode($data['place']);
        die();
    }

    public function getUserByEmail()
    {
        $data['user'] = $this->model('Auth_model')->getDataUserByEmail($_POST['email']);

        $response = [];
        if (!empty($data['user'])) {
            $response['status'] = 1;
            $response['pesan'] = "Data Tersedia";
            $response['fullname'] = $data['user']['fullname'];
            $response['profile'] = $data['user']['profile'];
            $response['id'] = $data['user']['id'];
        } else {
            $response['status'] = 0;
            $response['pesan'] = "data tidak tersedia";
        }

        echo json_encode($response);
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
        $result = $this->model('Auth_model')->loginMobile($_POST);
        if ($result > 0) {
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
    public function getId()
    {
        $response = [];
        if ($data['id'] = $this->model('Auth_model')->getUserByEmail($_POST['email']) > 0) {
            // $result = $this->db->single();
            $response['status'] = 1;
            $response['pesan'] = "Data Tersedia";
        } else {
            $response['status'] = 0;
            $response['pesan'] = "Data Tidak Tersedia";
        }

        echo json_encode($response);
        echo json_encode($data['id']);
        // echo json_encode($result);
    }

    public function getAllEvent()
    {
        echo json_encode($this->model('Events_model')->getDataEvents());
    }
    public function getEventThumbnail()
    {
        echo json_encode($this->model('Events_model')->getThumbnailEvent());
    }

    /*public function getDetailEvent()
    {
        $data['event'] = $this->model('API_model')->getEventByID($_POST['id']);
        $response = [];
        if (!empty($data['event'])) {
            $response['status'] = 1;
            $response['pesan'] = "Data Tersedia";
            $response['detailEvent'] = $data['event'];
        } else {
            $response['status'] = 0;
            $response['pesan'] = "data tidak tersedia";
        }

        echo json_encode($response);
    }
    */

    public function getAllUserEvent($id)
    {
        echo json_encode($this->model('API_model')->getAllUserEvent($id));

    }

    public function getEventByKeyword($keyword)
    {
        echo json_encode($this->model('API_model')->getEventByKeyword($keyword));
    }

    public function updateProfil()
    {
        $response = [];
        if ($this->model('Auth_model')->updateProfil($_POST) > 0) {
            $response['status'] = 2;
            $response['pesan'] = "Berhasil Update";
        } else {
            $response['status'] = 0;
            $response['pesan'] = "Gagal Update";
        }
        echo json_encode($response);
    }
}
