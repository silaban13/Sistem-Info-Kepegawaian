<?php

require_once __DIR__ . "/../models/SearchModel.php";

class SearchController
{

    public function search()
    {

        $keyword = $_GET['q'] ?? '';

        if(empty($keyword)){
            echo json_encode([]);
            return;
        }

        $model = new SearchModel();
        $data = $model->search($keyword);
        header("Content-Type: application/json");
        echo json_encode($data);

    }

}