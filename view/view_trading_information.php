<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Your Deals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
</head>
<body>

<?php include "navbar.php" ?>

<?php

require_once "../medoo.php";
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

    $user_to_select = $_SESSION["login_email"];

    $user_information = $database->select("users_information", ["user_id",
        "user_nickname",
        "user_password",
        "user_nickname",
        "user_gender",
        "user_area",
        "user_phonenumber"], ["user_email" => $user_to_select])[0];

    $id = $user_information["user_id"];

    $trade_information = $database->select("trading_information", ["trade_id",
        "trade_need_id",
        "trade_first_user_id",
        "trade_second_user_id",
        "trade_start_trade_time",
        "trade_state"], ["OR" => ["trade_first_user_id" => $id, "trade_second_user_id" => $id]]);

    $trade_number = count($trade_information);

    for ($i = 0; $i < $trade_number; $i++) {
        $need_information[$i] = $database->select("needs_information", ["need_title"], ["need_id" => $trade_information[$i]["trade_need_id"]])[0];

        $user_name[$i] = $database->select("users_information", ["user_nickname"], ["user_id" => $trade_information[$i]["trade_first_user_id"]])[0];
    }


} catch (Exception $exception) {
    header("Location: view_message_page.php?type=serverError");
}

?>

<?php
$panel = ["panel-primary", "panel-success", "panel-warning", "panel-danger", "panel-info"];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-3">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <?php include_once "categoryNav.php"; ?>
                </div>
            </div>
        </div>
        <div class="well col-sm-8 col-md-6">
            <div class="row">
                <?php
                for ($i = 0; $i < $trade_number; $i++) {
                    ?>
                    <div class="col-md-6">
                        <div class="panel <?php echo $panel[rand(0, 4)]; ?>">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <?php echo $need_information[$i]["need_title"]; ?>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table>
                                            <tr>
                                                <th><p class="label label-primary">trade sponsor:</p></th>
                                                <td>
                                                    <p class="btn btn-default"><?php echo $user_name[$i]["user_nickname"] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><p class="label label-success">trade start time:</p></th>
                                                <td>
                                                    <code><?php echo $trade_information[$i]["trade_start_trade_time"] ?></code>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><p class="label label-warning">trade state:</p></th>
                                                <td>
                                                    <?php if ($trade_information[$i]["trade_state"] === '0') { ?>
                                                        <p class="btn btn-danger">canceled</p><?php } ?>
                                                    <?php if ($trade_information[$i]["trade_state"] === '1') { ?>
                                                        <p class="btn btn-primary">under dealing</p><?php } ?>
                                                    <?php if ($trade_information[$i]["trade_state"] === '2') { ?>
                                                        <p class="btn btn-success">deal completed</p><?php } ?>
                                                </td>
                                            </tr>
                                        </table>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                <?php } ?>

            </div>


        </div>
        <div class="col-sm-2 col-md-3"></div>
    </div>
</div>      