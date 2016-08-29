<?php
/**
 * Created by PhpStorm.
 * User: fengd
 * Date: 2016/8/27 0027
 * Time: 11:50
 */
session_start();
require_once "../medoo.php";

$nickname_to_register = trim($_POST["nickname"]);
$email_to_register = trim($_POST["mail"]);
$password_to_register = trim($_POST["pwd"]);
$gender_to_register = $_POST["genderOptions"];

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

    $user_exists = $database->select("users_information", "user_email", ["user_email" => $email_to_register]);

    if (count($user_exists) == 0) {
        // user not exists, insert the information into db

        $database->insert("users_information", [
            "user_nickname" => $nickname_to_register,
            "user_email" => $email_to_register,
            "user_password" => $password_to_register,
            "user_gender" => $gender_to_register
        ]);

        // register succeeded, go to message page
        header("Location: view_message_page.php?type=signupSucceeded");
    } else {
        // user already exists, go to error page
        header("Location: view_message_page.php?type=signupWrong");
    }

} catch (Exception $exception) {
    //if database server goes wrong, go to error page
    header("Location: view_message_page.php?type=serverError");
}
