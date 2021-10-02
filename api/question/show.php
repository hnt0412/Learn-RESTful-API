<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
include_once('../../config/db.php');
include_once('../../model/question.php');
$db = new db();
$connect = $db->connect();

$question = new question($connect);
$question->id_cauhoi = isset($_GET['id']) ? $_GET['id'] : die();
$question->show();

$question_item = array(
    'id_question' => $question->id_cauhoi,
    'title_question' => $question->title,
    'cau_1' => $question->cau_1,
    'cau_2' =>$question->cau_2,
    'cau_3' => $question->cau_3,
    'cau_4' =>$question->cau_4,
    'cau_dung' => $question->cau_dung
);

print_r(json_encode($question_item));


?>