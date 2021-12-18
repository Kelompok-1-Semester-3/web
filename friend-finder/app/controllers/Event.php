<?php

class Event extends Controller
{

    public function index()
    {
        $data['title'] = 'Event';
        $credential = $_SESSION['account'];
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        // user event
        $data['events'] = $this->model('Events_model')->getAllEvents();
        $data['categories'] = $this->model('Category_model')->getAllCategory();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('event/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $credential = $_SESSION['account'];
        // var_dump($credential);
        // die();
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        $data['title'] = 'Event Detail';
        $data['categories'] = $this->model('Category_model')->getAllCategory();
        $data['event'] = $this->model('Events_model')->getEventByID($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('event/detail', $data);
        $this->view('templates/footer');
    }

    // insert new event
    public function insert()
    {
        $event_picture = $this->upload($_FILES['event_picture']);
        $_POST['event_picture'] = $event_picture;
        $_POST['created_by'] = $_SESSION['account']['id'];
        if ($this->model('Events_model')->store($_POST)) {
            Flasher::setFlash('Success', 'Add New Event Successfully', 'success');
            header('Location: ' . BASE_URL . '/dashboard');
        } else {
            Flasher::setFlash('Faileds', 'Add New Event Failed', 'danger');
            header('Location: ' . BASE_URL . '/dashboard');
        }
    }

    // upload
    public function upload($data)
    {
        // image handler
        $name = $data['name'];
        $size = $data['size'];
        $erro = $data['error'];
        $tmp_name = $data['tmp_name'];
        $extensions = ['jpg', 'png', 'jpeg'];
        $extension = explode('.', $name);
        $extension = strtolower(end($extension));

        if ($erro == 4) {
            Flasher::setFlash('failed', 'Add Event Picture', 'danger');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        }

        // check extensions
        if (!in_array($extension, $extensions)) {
            Flasher::setFlash('Failed ', 'Extension Not Valid', 'danger');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        }
        // check size
        if ($size > 1000000) {
            Flasher::setFlash('Failed ', 'Size of picture too large', 'danger');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        }

        // generate filename
        $newName = uniqid();
        $newName .= $newName . '.' . $extension;
        move_uploaded_file($tmp_name, "../public/img/$newName");
        return $newName;
    }

    // show edit form
    public function edit($id)
    {
        $credential = $_SESSION['account'];
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        $data['title'] = 'Edit Event';
        $data['categories'] = $this->model('Category_model')->getAllCategory();
        $data['event'] = $this->model('Events_model')->getEventByID($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('event/edit', $data);
        $this->view('templates/footer');
    }

    // update event
    public function update()
    {
        $data['event'] = $this->model('Events_model')->getEventByID($_POST['id']);
        if ($_FILES['event_picture']['error'] == 4) {
            $_POST['event_picture'] = $data['event']['event_picture'];
        } else {
            $_POST['event_picture'] = $this->upload($_FILES['event_picture']);
        }
        $_POST['created_by'] = $_SESSION['account']['id'];

        if ($this->model('Events_model')->update($_POST)) {
            Flasher::setFlash('Success', 'Update Event Successfully', 'success');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        } else {
            Flasher::setFlash('Failed', 'Update Event Failed', 'danger');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        }
    }

    public function delete($id)
    {
        if ($this->model('Events_model')->destroy($id)) {
            Flasher::setFlash('Success', 'Delete Event Successfully', 'success');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        } else {
            Flasher::setFlash('Failed', 'Delete Event Failed', 'danger');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        }
    }

    public function getEventByCategory()
    {
        echo json_encode($this->model('Events_model')->getEventByCategory($_POST['category_id']));
    }

    public function getEvenyByKeyword()
    {
        echo json_encode($this->model('Events_model')->getEventByKeyword($_POST['keyword']));
    }
}
