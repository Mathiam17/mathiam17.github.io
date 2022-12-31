<?php
include 'model.php';

$model = new Model();

$rows = $model->fetchAll();

$data = array('rows' => $rows);

header("Access-Control-Allow-Origin: *");
echo json_encode($data);