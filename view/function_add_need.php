<?php
/**
 * Created by PhpStorm.
 * User: fengd
 * Date: 2016/8/30 0030
 * Time: 20:46
 */

session_start();
require_once "../medoo.php";

$photoBaseDir = '/home/iwp201601/images/goods_photos/';

$get_user_id = trim($_SESSION["login_user_id"]);
$get_title = trim($_POST["title"]);
$get_description = trim($_POST["description"]);
$get_need_description = trim($_POST["need_description"]);
$get_condition = $_POST["condition"];
$get_firstclass = $_POST["firstClass"];
$get_secondclass = $_POST["secondClass"];
date_default_timezone_set('Asia/Shanghai');
$get_time = date("Y-m-d H:i:s");

var_dump($files = $_FILES["file"]);
$number_of_photos = count($files["name"]);

$complete_path_to_photo = array();

for ($i = 0; $i < $number_of_photos; $i++) {
    if(move_uploaded_file($files["tmp_name"][$i], $photoBaseDir.$files["name"][$i])){
        $complete_path_to_photo[$i] = $photoBaseDir.$files["name"][$i];
    }
}

var_dump($complete_path_to_photo);

//$photo_json = json_encode($get_photo);

try {
    // connect to db
    $database = new medoo([
        'database_type' => 'mysql',
        'database_name' => 'eswap',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',

        // [optional]
        'port' => 3306,
    ]);

//    $database->insert("needs_information", [
//            "need_user_id" => $get_user_id,
//            "need_start_time" => $get_time,
//            "need_state" => '0',
//            "need_title" => $get_title,
//            "need_goods_description" => $get_description,
//            "need_goods_quality" => $get_condition,
//            "need_goods_first_class" => $get_firstclass,
//            "need_goods_second_class" => $get_secondclass,
//            "need_goods_picture_path" => $photo_json,
//            "need_goal_goods" => $get_need_description,
//        ]);

    // register succeeded, go to message page
    //header("Location: view_message_page.php?type=addNeedSuccess");

} catch (Exception $exception) {
    //if database server goes wrong, go to error page
    header("Location: view_message_page.php?type=serverError");
}

