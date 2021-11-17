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
}
