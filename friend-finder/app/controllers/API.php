<?php

class API extends Controller
{

    public function getDetailEvent($id)
    {
        echo json_encode($this->model('API_model')->getEventByID($id));
    }

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

    public function getAllCategories()
    {
        echo json_encode($this->model('API_model')->getAllCategories());
    }

    public function getDetailAccount($id)
    {
        echo json_encode($this->model('API_model')->getDetailAccount($id));
    }

    public function addNewEvent()
    {
        $target = "../public/img";
        $filename =  uniqid() . '.jpeg';
        $target = $target . '/' . $filename;
        $image = $_POST['event_picture'];
        if (file_put_contents($target, base64_decode($image))) {
            echo json_encode([
                'message' => "The file has been uploaded",
                'status' => "Ok"
            ]);
        } else {
            echo json_encode([
                'message' => "Sorry, upload image failed!",
                'status' => "Error"
            ]);
        }
        $_POST['event_picture'] = $filename;
        $this->model('Events_model')->store($_POST);
    }
    
    public function editEvent()
    {
        $target = "../public/img";
        $filename =  uniqid() . '.jpeg';
        $target = $target . '/' . $filename;
        $image = $_POST['event_picture'];
        if (file_put_contents($target, base64_decode($image))) {
            echo json_encode([
                'message' => "The file has been uploaded",
                'status' => "Ok"
            ]);
        } else {
            echo json_encode([
                'message' => "Sorry, upload image failed!",
                'status' => "Error"
            ]);
        }
        $_POST['event_picture'] = $filename;
        $this->model('Events_model')->update($_POST);
    }

    public function updateAccount()
    {
        $target = "../public/img";
        $filename =  uniqid() . '.jpeg';
        $target = $target . '/' . $filename;
        $image = $_POST['profile'];
        if (file_put_contents($target, base64_decode($image))) {
            echo json_encode([
                'message' => "The file has been uploaded",
                'status' => "Ok"
            ]);
        } else {
            echo json_encode([
                'message' => "Sorry, upload image failed!",
                'status' => "Error"
            ]);
        }

        $_POST['profile'] = $filename;
        $this->model('Account_model')->update($_POST);
    }
    public function UserEventDestroy()
    {
        $response = [];
      $data['event'] = ($this->model('Events_model')->destroy($_POST['id'])); 
      if (!empty($data['event'])) {
          $response['status'] =  1;
          $response['pesan'] = "Data Berhasil dihapus";
      }else{
        $response['status'] =  0;
          $response['pesan'] = "Data Gagal dihapus";  
      }
      echo json_encode ($response);
    }
}
