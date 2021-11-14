<?php

class Account extends Controller
{
    public function index()
    {
        $data['title'] = 'Account';
        $credential = $_SESSION['account'];

        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('account/index', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        $credential = $_SESSION['account'];
        $data['account'] = $credential;

        if ($_FILES['profile']['error'] == 4) {
            $_POST['profile'] = $data['account']['profile'];
        } else {
            $_POST['profile'] = $this->upload($_FILES['profile']);
        }

        if ($this->model('Account_model')->update($_POST)) {
            Flasher::setFlash('Success', 'Update Account Successfully', 'success');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        } else {
            Flasher::setFlash('Faileds', 'Update Account Failed', 'danger');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        }
    }

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
}
