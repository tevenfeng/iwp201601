<?php
/**
 * Created by PhpStorm.
 * User: fengd
 * Date: 2016/8/28 0028
 * Time: 17:04
 */

session_start();

require_once "../meekrodb.2.3.class.php";

$nickname_to_update = trim($_POST["nickname"]);
$gender_to_update = $_POST["genderOptions"];
$password_to_update = trim($_POST["password"]);
$city_to_update = trim($_POST["city"]);
$phone_to_update = trim($_POST["phone"]);
$email_to_compare = $_SESSION["login_email"];

try {
    // connect to db

    // there's some problem with updating in medoo, so use meekrodb
    DB::$user = 'root';
    DB::$password = 'root';
    DB::$host = "localhost";
    DB::$dbName = 'eswap';

    DB::query("UPDATE users_information
set user_nickname=\"" . $nickname_to_update . "\",
user_password=\"" . $password_to_update . "\",
user_gender=\"" . $gender_to_update . "\",
user_area=\"" . $city_to_update . "\",
user_phonenumber=\"" . $phone_to_update . "\"
where user_email=\"" . $email_to_compare . "\";");

    header("Location: view_message_page.php?type=profileUpdateSuccess");

} catch (MeekroDBException $exception) {
    header("Location: view_message_page.php?type=serverError?exception=".$exception->getMessage());
}