<?php
session_start();

include "../medoo.php";

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
} catch (Exception $exception) {
    //if database server goes wrong
    header("Location: view_message_page.php?type=serverError");
}

if (isset($_GET["message_id"])) {
    $message_id = $_GET["message_id"];
}

if (isset($_GET["from"])) {
    $from = $_GET["from"];
}

if (isset($_GET["message_need_id"])) {
    $message_need_id = $_GET["message_need_id"];
}

if (isset($_GET["unread"])) {
    if ($_SESSION["unread_messages_number"] > 0) {
        $_SESSION["unread_messages_number"]--;

        try {

            $database->update("station_message", ["message_status" => 1], ["message_id" =>$message_id]);



        } catch (Exception $exception) {
            //if database server goes wrong
            header("Location: view_message_page.php?type=serverError");
        }

    }
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
</head>
<body>

<?php include "navbar.php" ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-3"></div>
        <div class="col-sm-8 col-md-6">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Title</h4>
                    </div>
                    <div class="modal-body">
                        <p>Body</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn href=" #">DISMISS</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-md-3"></div>
    </div>
</div>

</body>
</html>