<?php

class Place extends Controller
{

    public function index()
    {
        $data['title'] = 'Place';
        $credential = $_SESSION['account'];
        $data['account'] = $this->model('Account_model')->getAccountBYID($credential['id']);
        $data['place'] = $this->model('Place_model')->getAllPlace();

        // echo json_encode($data['place']);
        // die();

        // view
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('place/index', $data);
        $this->view('templates/footer');

        // echo json_encode($data['account']);
        // die();
    }

    public function detail($id)
    {
        $data['title'] = 'Place Owner';
        $credential = $_SESSION['account'];
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        $data['place'] = $this->model('Place_model')->getPlaceByID($id);
        $data['categories'] = $this->model('Category_model')->getAllCategory();
        $data['transactions'] = $this->model('Transaction_model')->getAllTransactionByPlaceID($id);

        // echo json_encode($data['transactions']);
        // die();

        $this->view('po_dashboard/templates/header', $data);
        $this->view('po_dashboard/templates/sidebar');
        $this->view('place/detail', $data);
        $this->view('po_dashboard/templates/footer');
    }

    public function contactOwnerPlace()
    {
        $place_name = htmlspecialchars($_POST['place_name']);
        $contact_person = htmlspecialchars($_POST['contact_person']);
        $contact_person = explode('0', $contact_person);
        $contact_person = '62' . end($contact_person);
        $name = htmlspecialchars($_POST['name']);
        $phone_number = htmlspecialchars($_POST['phone_number']);
        $start = htmlspecialchars($_POST['start']);
        $end = htmlspecialchars($_POST['end']);

        $text = "Excuse%20me%2C%20can%20I%20make%20a%20reservation%20for%20a%20place%3A%0A%0APlace%20name%3A%20$place_name%0AName%20%3A%20$name%0APhone%20number%3A%20$phone_number%0A%0AFor%20Hours%0AStart%3A%20$start%0AEnd%3A%20$end%0A%0A%0Afrom%3A%20%40friendfinder";

        header('Location: https://api.WhatsApp.com/send?phone=' . $contact_person . '&text=' . $text);
    }

    public function visit($id)
    {
        $data['title'] = 'Place Owner';
        $credential = $_SESSION['account'];
        $data['account'] = $this->model('Account_model')->getAccountByID($credential['id']);
        $data['place'] = $this->model('Place_model')->getPlaceByID($id);
        $data['categories'] = $this->model('Category_model')->getAllCategory();
        $data['transactions'] = $this->model('Transaction_model')->getAllTransactionByPlaceID($id);

        // echo json_encode($data['transactions']);
        // die();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('place/detail', $data);
        $this->view('templates/footer');
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
