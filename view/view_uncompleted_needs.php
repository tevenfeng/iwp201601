<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Unfinished Needs</title>
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

    $need_information = $database->select("needs_information", ["need_id",
        "need_title",
        "need_goods_description",
        "need_goods_picture_path"], ["AND" => ["need_user_id" => $id, "need_state" => 0]]);

    $need_number = count($need_information);

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
            <!--            在这里放这个页面的内容-->

            <div class="row">
                <?php
                for ($i = 0; $i < $need_number; $i++) {
                    $pictures = json_decode($need_information[$i]["need_goods_picture_path"], true);
                    ?>
                    <div class="col-md-6">
                        <a href="/view/view_goods_information.php?need_id=<?php echo $need_information[$i]["need_id"]; ?>">
                            <div class="panel <?php echo $panel[rand(0, 4)]; ?>">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $user_information["user_nickname"] . ': '; ?>
                                        <?php echo $need_information[$i]["need_title"]; ?>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <img src="<?php echo $pictures[0]; ?>" height="300px;"/>
                                    </div>
                                    <div>
                                        <?php echo substr($need_information[$i]["need_goods_description"], 0, 100) . '……'; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-2 col-md-3"></div>
    </div>
</div>      