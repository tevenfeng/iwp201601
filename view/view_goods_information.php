<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Your choice to swap things</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
</head>
<body>

<?php include "navbar.php" ?>

<?php

if(isset($_GET['need_id']))
{
 $goods_id= $_GET['need_id'];
}

//$goods_id = '1';
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

    $need_information = $database->select("needs_information", ["need_id",
        "need_user_id",
        "need_start_time",
        "need_state",
        "need_title",
        "need_goods_description",
        "need_goods_quality",
        "need_goods_first_class",
        "need_goods_second_class",
        "need_goods_picture_path",
        "need_goal_goods"], ["need_id" => $goods_id])[0];

    $user_information = $database->select("users_information", ["user_id",
        "user_nickname",
        "user_password",
        "user_nickname",
        "user_gender",
        "user_area",
        "user_phonenumber"], ["user_id" => $need_information["need_user_id"]])[0];

    $panel = ["panel-primary", "panel-success", "panel-warning", "panel-danger", "panel-info"];

} catch (Exception $exception) {
    header("Location: view_message_page.php?type=serverError");
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-3">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <?php include "categoryNav.php"; ?>
                </div>
            </div>
            <br/>
        </div>
        <div class="col-sm-8 col-md-6">
            <!--            在这里放这个页面的内容-->

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $need_information["need_title"] ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <div>
                        <div class="row">
                            <div class="col-md-6"><?php echo $need_information["need_goods_picture_path"] ?></div>
                            <div class="col-md-6">
                                <div class="text-primary" style="font-family:verdana">
                                    goods sponsor:<?php echo $user_information["user_nickname"] ?>
                                </div>
                                </br>
                                <div class="text-warning" style="font-family:verdana">
                                    goods deal start time:<?php echo $need_information["need_start_time"] ?>
                                </div>
                                </br>
                                <div class="text-danger" style="font-family:verdana">
                                    goods
                                    class:<?php echo $need_information["need_goods_first_class"] . '-' ?><?php echo $need_information["need_goods_second_class"] ?>
                                </div>
                                </br>
                                <div class="text-success" style="font-family:verdana">
                                    goods state:<?php echo $need_information["need_goods_quality"] ?>
                                </div>
                                </br>
                                <div>
                                    <a href="javascript:void(0)" class="btn btn-raised btn-warning">apply for
                                        dealing</a>
                                </div>
                                </br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" style="background-color:#1AD42A"></div>
                        <div class="col-md-6" style="background-color:#1AD42A"></div>
                    </div>

                    <div class="text-muted" style="font-family:verdana">
                        goods description:<?php echo $need_information["need_goods_description"] ?>
                    </div>
                    </br>

                    <div class="row">
                        <div class="col-md-6" style="background-color:#1AD42A"></div>
                        <div class="col-md-6" style="background-color:#1AD42A"></div>
                    </div>

                    <div class="text-muted" style="font-family:verdana">
                        goal goods description:<?php echo $need_information["need_goal_goods"] ?>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-sm-2 col-md-3"></div>
    </div>
</div>

</body>
</html>