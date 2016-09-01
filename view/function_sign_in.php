<?php
/**
 * Created by PhpStorm.
 * User: fengd
 * Date: 2016/8/27 0027
 * Time: 9:47
 */
session_start();
require_once '../medoo.php';

$email_login = trim($_POST["mail"]);
$pwd_login = trim($_POST["pwd"]);

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

    $pwd_correct = $database->select("users_information", ["user_password", "user_nickname", "user_id"], ["user_email" => $email_login]);

    if ((count($pwd_correct) != 0) && ($pwd_correct[0]["user_password"] == $pwd_login)) {
        //correct login, set session
        $_SESSION["login_email"] = $email_login;
        $_SESSION["login_nickname"] = $pwd_correct[0]["user_nickname"];
        $_SESSION["login_user_id"] = $pwd_correct[0]["user_id"];

        $number_of_unread_messages = $database->count("station_message", ["AND" => ["message_to_user_id" => $_SESSION["login_user_id"], "message_status"=>0]]);

        $_SESSION["unread_messages_number"] = $number_of_unread_messages;

        header("Location: /");
    } else {
        //wrong login, go to error page
        header("Location: view_message_page.php?type=signinWrong");
    }
} catch (Exception $exception) {
    //if database server goes wrong
    header("Location: view_message_page.php?type=serverError");
}




