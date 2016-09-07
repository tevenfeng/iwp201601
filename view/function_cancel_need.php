<?php
/**
 * Created by PhpStorm.
 * User: fengd
 * Date: 2016/9/7 0007
 * Time: 21:49
 */
require_once "../medoo.php";
if (isset($_GET["need_id"])) {
    $need_id = $_GET["need_id"];
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

        $database->update("needs_information", ["need_state" => 1], ["need_id" => $need_id]);

        header("Location: view_uncompleted_needs.php");

    } catch (Exception $exception) {
        header("Location: view_message_page.php?type=serverError");
    }
}