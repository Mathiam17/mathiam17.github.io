<?php
if (isset($_POST["sku"]) && isset($_POST["name"]) && isset($_POST["price"])) {
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $size = $_POST["size"];
    $height = $_POST["height"];
    $width = $_POST["width"];
    $length = $_POST["length"];
    $weight = $_POST["weight"];

    include "model.php";

    $model = new Model();

    if ($model->insert($sku, $name, $price, $size, $height, $width, $length, $weight)) {
        $data = array("res" => "success");
    } else {
        $data = array("res" => "error");
    }

    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
}