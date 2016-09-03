<?php
/**
 * Created by PhpStorm.
 * User: fengd
 * Date: 2016/9/3 0003
 * Time: 21:21
 */
session_start();
include "../medoo.php";

if (isset($_POST["to_user_id"])) {
    $to = $_POST["to_user_id"];
}

if (isset($_POST["need_id"])) {
    $need_id = $_POST["need_id"];
}

try {
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

    $database->insert("station_message", ["message_from_user_id" => $_SESSION["login_user_id"],
        "message_to_user_id" => $to,
        "message_time" => date("Y-m-d H:i:s"),
        "message_need_id" =>$need_id,
        "message_status"=>0,
        "message_type"=>1,
        "message_agree_request"=>1
    ]);

    header("Location: view_station_message.php");

} catch (Exception $exception) {
    //if database server goes wrong

}