<?php

if(isset($_GET["need_id"])){
    $need_id=$_GET["need_id"];
}
if(isset($_GET["need_user_id"])){
    $need_user_id=$_GET["need_user_id"];
}
require_once "../medoo.php";

session_start();

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

    date_default_timezone_set('Asia/Shanghai');
    $database->insert("station_message", [
        "message_from_user_id"=>$_SESSION["login_user_id"],
        "message_to_user_id"=>$need_user_id,
        "message_need_id"=>$need_id,
        "message_time"=>date("Y-m-d H:i:s"),
        "message_status"=>0,
        "message_type"=>0
    ]);

    header("Location: view_message_page.php?type=applySuccess");

} catch (Exception $exception) {
    header("Location: view_message_page.php?type=serverError");
}