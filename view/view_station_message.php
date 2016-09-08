<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Requests and Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <style>
        /*some css codes that override codes in bootstrap-material-design.css*/
        .nav-tabs {
            border-bottom: 2px solid #DDD;
        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
            border-width: 0;
        }

        .nav-tabs > li > a {
            border: none;
            color: #666;
            text-align: center;
        }

        .nav-tabs > li.active > a, .nav-tabs > li > a:hover {
            border: none;
            color: #000000 !important;
            background: transparent;
        }

        .nav-tabs > li > a::after {
            content: "";
            background: #4285F4;
            height: 2px;
            position: absolute;
            width: 100%;
            left: 0px;
            bottom: -1px;
            transition: all 250ms ease 0s;
            transform: scale(0);
        }

        .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after {
            transform: scale(1);
        }

        .tab-nav > li > a::after {
            background: #21527d none repeat scroll 0% 0%;
            color: #fff;
        }

        .tab-pane {
            padding: 15px 0;
        }

        .tab-content {
            padding: 20px
        }

        .card {
            background: #FFF none repeat scroll 0% 0%;
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
        }

        body {
            background: #EDECEC;
            padding: 0px
        }
    </style>
</head>
<body>

<?php
include "navbar.php";

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

    if (isset($_SESSION["login_user_id"])) {
        $user_id = $_SESSION["login_user_id"];
    }

    $unread_messages = $database->select("station_message", "*", ["AND" => ["message_to_user_id" => $user_id, "message_status" => 0]]);

    $unread_message_user_nicknames = array();
    $unread_message_need_title = array();

    foreach ($unread_messages as $message) {
        $unread_message_user_nicknames[$message["message_from_user_id"]] = $database->select("users_information", ["user_nickname"], ["user_id" => $message["message_from_user_id"]])[0]["user_nickname"];
        $unread_message_need_title[$message["message_need_id"]] = $database->select("needs_information", ["need_title"], ["need_id" => $message["message_need_id"]])[0]["need_title"];
    }

    $all_messages = $database->select("station_message", "*", ["message_to_user_id" => $user_id]);

    $all_message_user_nicknames = array();
    $all_message_need_title = array();

    foreach ($all_messages as $message) {
        $all_message_user_nicknames[$message["message_from_user_id"]] = $database->select("users_information", ["user_nickname"], ["user_id" => $message["message_from_user_id"]])[0]["user_nickname"];
        $all_message_need_title[$message["message_need_id"]] = $database->select("needs_information", ["need_title"], ["need_id" => $message["message_need_id"]])[0]["need_title"];
    }

} catch (Exception $exception) {
    //if database server goes wrong
    header("Location: view_message_page.php?type=serverError");
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-3">
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <div class="card">
                        <ul class="nav nav-tabs nav-stacked" style="margin-bottom: 15px;">
                            <li class="active"><a href="#unread" data-toggle="tab">Unread <span
                                        class="badge"><?php if ($_SESSION["unread_messages_number"] > 0) {
                                            echo $_SESSION["unread_messages_number"];
                                        } ?></span></a></li>
                            <li><a href="#all" data-toggle="tab">All</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="well col-sm-8 col-md-7">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="unread">
                    <div class="list-group">
                        <?php
                        foreach ($unread_messages as $unread_message) {
                            if ($unread_message["message_type"] == 0) {
                                ?>
                                <a href="view_reading_station_message.php?message_id=<?php echo $unread_message["message_id"]; ?>&message_need_id=<?php echo $unread_message["message_need_id"]; ?>&unread=true&from=<?php echo $unread_message_user_nicknames[$unread_message["message_from_user_id"]]; ?>">
                                    <div class="list-group-item">
                                        <div class="row-content">
                                            <div class="action-secondary"><i class="material-icons">info</i></div>
                                            <h4 class="list-group-item-heading">Message from
                                                <?php echo $unread_message_user_nicknames[$unread_message["message_from_user_id"]]; ?>
                                            </h4>
                                            <p class="list-group-item-text">I want to have a further talk with you about
                                                your thread
                                                "<?php echo $unread_message_need_title[$unread_message["message_need_id"]]; ?>
                                                "</p>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            } else if (($unread_message["message_type"] == 1) && ($unread_message["message_agree_request"] == 0)) {
                                ?>
                                <a href="view_reading_station_message.php?message_id=<?php echo $unread_message["message_id"]; ?>&message_need_id=<?php echo $unread_message["message_need_id"]; ?>&unread=true&from=<?php echo $unread_message_user_nicknames[$unread_message["message_from_user_id"]]; ?>">
                                    <div class="list-group-item">
                                        <div class="row-content">
                                            <div class="action-secondary"><i class="material-icons">info</i></div>
                                            <h4 class="list-group-item-heading">Message from
                                                <?php echo $unread_message_user_nicknames[$unread_message["message_from_user_id"]]; ?>
                                            </h4>
                                            <p class="list-group-item-text">He/She denied your request to have a further
                                                talk with hime/her about
                                                the thread
                                                "<?php echo $unread_message_need_title[$unread_message["message_need_id"]]; ?>
                                                "</p>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            } else if (($unread_message["message_type"] == 1) && ($unread_message["message_agree_request"]) == 1) {
                                ?>
                                <a href="view_reading_station_message.php?message_id=<?php echo $unread_message["message_id"]; ?>&message_need_id=<?php echo $unread_message["message_need_id"]; ?>&unread=true&from=<?php echo $unread_message_user_nicknames[$unread_message["message_from_user_id"]]; ?>">
                                    <div class="list-group-item">
                                        <div class="row-content">
                                            <div class="action-secondary"><i class="material-icons">info</i></div>
                                            <h4 class="list-group-item-heading">Message from
                                                <?php echo $unread_message_user_nicknames[$unread_message["message_from_user_id"]]; ?>
                                            </h4>
                                            <p class="list-group-item-text">He/She agreed with your request to have a
                                                further talk with hime/her about
                                                the thread
                                                "<?php echo $unread_message_need_title[$unread_message["message_need_id"]]; ?>
                                                "</p>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="all">
                    <div class="list-group">
                        <?php
                        foreach ($all_messages as $all_message) {
                            if ($all_message["message_type"] == 0) {
                                ?>
                                <a href="view_reading_station_message.php?message_id=<?php echo $all_message["message_id"]; ?>&message_need_id=<?php echo $all_message["message_need_id"]; ?>&from=<?php echo $all_message_user_nicknames[$all_message["message_from_user_id"]]; ?><?php if($all_message["message_status"] == 0) {echo '&unread=true';}?>">
                                    <div class="list-group-item">
                                        <div class="row-content">
                                            <?php
                                            if ($all_message["message_status"] == 0) {
                                                ?>
                                                <div class="action-secondary"><i class="material-icons">info</i></div>
                                            <?php } ?>
                                            <h4 class="list-group-item-heading">Message from
                                                <?php echo $all_message_user_nicknames[$all_message["message_from_user_id"]]; ?>
                                            </h4>
                                            <p class="list-group-item-text">I want to have a further talk with you about
                                                your thread
                                                "<?php echo $all_message_need_title[$all_message["message_need_id"]]; ?>
                                                "</p>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            } else if (($all_message["message_agree_request"] == 0) && ($all_message["message_type"] == 1)) {
                                ?>
                                <a href="view_reading_station_message.php?message_id=<?php echo $all_message["message_id"]; ?>&message_need_id=<?php echo $all_message["message_need_id"]; ?>&from=<?php echo $all_message_user_nicknames[$all_message["message_from_user_id"]]; ?><?php if($all_message["message_status"] == 0) {echo '&unread=true';}?>">
                                    <div class="list-group-item">
                                        <div class="row-content">
                                            <?php
                                            if ($all_message["message_status"] == 0) {
                                                ?>
                                                <div class="action-secondary"><i class="material-icons">info</i></div>
                                            <?php } ?>
                                            <h4 class="list-group-item-heading">Message from
                                                <?php echo $all_message_user_nicknames[$all_message["message_from_user_id"]]; ?>
                                            </h4>
                                            <p class="list-group-item-text">He/She denied your request to have a further
                                                talk with hime/her about
                                                the thread
                                                "<?php echo $all_message_need_title[$all_message["message_need_id"]]; ?>
                                                "</p>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            } else if (($all_message["message_agree_request"] == 1) && ($all_message["message_type"] == 1)) {
                                ?>
                                <a href="view_reading_station_message.php?message_id=<?php echo $all_message["message_id"]; ?>&message_need_id=<?php echo $all_message["message_need_id"]; ?>&from=<?php echo $all_message_user_nicknames[$all_message["message_from_user_id"]]; ?><?php if($all_message["message_status"] == 0) {echo '&unread=true';}?>">
                                    <div class="list-group-item">
                                        <div class="row-content">
                                            <?php
                                            if ($all_message["message_status"] == 0) {
                                                ?>
                                                <div class="action-secondary"><i class="material-icons">info</i></div>
                                            <?php } ?>
                                            <h4 class="list-group-item-heading">Message from
                                                <?php echo $all_message_user_nicknames[$all_message["message_from_user_id"]]; ?>
                                            </h4>
                                            <p class="list-group-item-text">He/She agreed with your request to have a
                                                further talk with hime/her about
                                                the thread
                                                "<?php echo $all_message_need_title[$all_message["message_need_id"]]; ?>
                                                "</p>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-md-2"></div>
    </div>
</div>

</body>
</html>