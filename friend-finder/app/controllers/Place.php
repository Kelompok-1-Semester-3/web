<?php

class Place extends Controller
{

    public function detail($id)
    {
        $data['title'] = 'Place Owner';
        $credential = $_SESSION['account'];
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        $data['place'] = $this->model('Place_model')->getPlaceByID($id);
        $data['categories'] = $this->model('Category_model')->getAllCategory();

        $this->view('po_dashboard/templates/header', $data);
        $this->view('po_dashboard/templates/sidebar');
        $this->view('place/detail', $data);
        $this->view('po_dashboard/templates/footer');
    }

    public function edit($id)
    {
        $credential = $_SESSION['account'];
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        $data['title'] = 'Edit Place';
        $data['categories'] = $this->model('Category_model')->getAllCategory();
        $data['place'] = $this->model('Place_model')->getPlaceByID($id);

        $this->view('po_dashboard/templates/header', $data);
        $this->view('po_dashboard/templates/sidebar');
        $this->view('place/edit', $data);
        $this->view('po_dashboard/templates/footer');
    }

    public function update()
    {

        $data['place'] = $this->model('Place_model')->getPlaceByID($_POST['id']);
        $_POST['created_at'] = date("Y-m-d");

        if ($_FILES['place_picture']['error'] == 4) {
            $_POST['place_picture'] = $data['place']['place_picture'];
        } else {
            $_POST['place_picture'] = $this->upload($_FILES['place_picture']);
        }

        if ($this->model('Place_model')->update($_POST)) {
            Flasher::setFlash('Success', 'Update Place Successfully', 'success');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        } else {
            Flasher::setFlash('Faileds', 'Update Place Failed', 'danger');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        }
    }

    public function store()
    {
        $_POST['price'] = (int) $_POST['price'];
        $_POST['category_id'] = (int) $_POST['category_id'];
        $place_picture = $this->upload($_FILES['place_picture']);
        $_POST['place_picture'] = $place_picture;
        $_POST['created_at'] = date("Y-m-d");
        // echo json_encode($_POST);
        // die();
        if ($this->model('Place_model')->addNewPlace($_POST)) {
            Flasher::setFlash('Success', 'Add New Place Successfully', 'success');
            echo "
                <script>window.history.back()</script>
            ";
        } else {
            Flasher::setFlash('Faileds', 'Add New Place Failed', 'danger');
            echo "
                <script>window.history.back()</script>
            ";
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

        if (
            $erro == 4
        ) {
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

    public function delete($id)
    {
        if ($this->model('Place_model')->destroy($id)) {
            Flasher::setFlash('Success', 'Delete place Successfully', 'success');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        } else {
            Flasher::setFlash('Failed', 'Delete place Failed', 'danger');
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        }
    }

    public function getDetailPlace()
    {
        echo json_encode($this->model('Place_model')->getPlaceByID($_POST['id']));
    }
}
