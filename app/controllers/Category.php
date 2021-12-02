<?php
class Category extends Controller
{
    public function allCategory()
    {
        echo json_encode($this->model('Category_model')->getAllCategory());
    }

    public function getCategoryByID()
    {
        echo json_encode($this->model('Category_model')->getCategoryByID($_POST['id']));
    }
}
