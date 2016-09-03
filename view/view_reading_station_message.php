<?php
session_start();

include "../medoo.php";

$message_information = "";
$need_information = "";
$message_need_id = "";
$message_id = "";

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

    if (isset($_GET["from"])) {
        $from = $_GET["from"];

        $from_email = $database->select("users_information", "user_email", ["user_nickname" => $from])[0];
    }

    if (isset($_GET["message_id"])) {
        $message_id = $_GET["message_id"];
        $message_information = $database->select("station_message", "*", ["message_id" => $message_id])[0];
    }

    if (isset($_GET["message_need_id"])) {
        $message_need_id = $_GET["message_need_id"];
        $need_information = $database->select("needs_information", "*", ["need_id" => $message_need_id])[0];
    }

    if (isset($_GET["unread"])) {
        if ($_SESSION["unread_messages_number"] > 0) {
            $_SESSION["unread_messages_number"]--;

            // turn its status to 1
            $database->update("station_message", ["message_status" => 1], ["message_id" => $message_id]);

        }
    }
} catch (Exception $exception) {
    //if database server goes wrong
    header("Location: view_message_page.php?type=serverError");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Message from <?php echo $from; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <script>
        function submit0() {
            document.dialog.action = "function_deny.php";
            document.dialog.submit();
        }

        function submit1() {
            document.dialog.action = "function_agree.php";
            document.dialog.submit();
        }
    </script>
</head>
<body>

<?php include "navbar.php" ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-3"></div>
        <div class="col-sm-8 col-md-6">
            <form class="modal-dialog" method="post" id="dialog" name="dialog">
                <div class="modal-content">
                    <?php
                    if ($message_information["message_type"] == 0) {
                        ?>
                        <div class="modal-header">
                            <h4 class="modal-title">Request
                                from <?php echo $from; ?></h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $from; ?> request to have a further
                                talk with you about your thread: "
                                <a href="view_goods_information.php?need_id=<?php echo $need_information["need_id"]; ?>"><?php echo $need_information["need_title"]; ?></a>
                                ", do you want to show him/her your email address?</p>
                        </div>
                        <input type="hidden" name="to_user_id"
                               value="<?php echo $message_information["message_from_user_id"]; ?>"/>
                        <input type="hidden" name="need_id"
                               value="<?php echo $message_information["message_need_id"]; ?>"/>
                        <div class="modal-footer">
                            <button class="btn btn-danger" onclick="submit0()">Ignore</button>
                            <button class="btn btn-success" onclick="submit1()">Accept</button>
                        </div>
                        <?php
                    } else if (($message_information["message_type"] == 1) && $message_information["message_agree_request"] == 0) {
                        ?>
                        <div class="modal-header">
                            <h4 class="modal-title">Reply
                                from <?php echo $from; ?></h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $from; ?> denied your request to have a further
                                talk with him/her about the thread: "
                                <a href="view_goods_information.php?need_id=<?php echo $need_information["need_id"]; ?>"><?php echo $need_information["need_title"]; ?></a>
                                ".</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-info" href="view_station_message.php">Back</a>
                        </div>
                        <?php
                    } else if (($message_information["message_type"] == 1) && $message_information["message_agree_request"] == 1) {
                        ?>
                        <div class="modal-header">
                            <h4 class="modal-title">Reply
                                from <?php echo $from; ?></h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $from; ?> agreed with your request to have a further
                                talk with him/her about the thread: "
                                <a href="view_goods_information.php?need_id=<?php echo $need_information["need_id"]; ?>"><?php echo $need_information["need_title"]; ?></a>
                                ", and his/her email address is <?php echo $from_email; ?></p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-info" href="view_station_message.php">Back</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </form>
        </div>
        <div class="col-sm-2 col-md-3"></div>
    </div>
</div>

</body>
</html>