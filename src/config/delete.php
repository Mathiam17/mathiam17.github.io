<?php
if (isset($_POST["sku"])) {
    $sku = $_POST["sku"];

    include "model.php";

    $model = new Model();

    if ($model->delete($sku)) {
        $data = array("res" => "success");
    }else{
        $data = array("res" => "error");
    }

    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
}