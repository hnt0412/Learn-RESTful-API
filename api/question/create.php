<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Header:Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include_once('../../config/db.php');
include_once('../../model/question.php');
$db = new db();
$connect = $db->connect();

    $question = new Question($connect);
    $data = json_decode(file_get_contents("php://input"));

    $question->title = $data->title;
    $question->cau_1 = $data->cau_1;
    $question->cau_2 = $data->cau_2;
    $question->cau_3 = $data->cau_3;
    $question->cau_4 = $data->cau_4;
    $question->cau_dung = $data->cau_dung;
    if($question->create()){
        echo json_encode(array('message','Question Created'));
    }else{
        echo json_encode(array('message','False'));
    }

?>