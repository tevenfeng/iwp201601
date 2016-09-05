<?php

$class = [
    "Error" => "danger",
    "Succeed" => "success"
];

$type = $_GET["type"];
if ($type === "signinWrong") {
    $messageType = "Error";
    $messageContent = 'The email or password you input maybe wrong, please click "DISSMISS" to try again!';
    $action = "view_sign_in.php";
} else if ($type == "signupWrong") {
    $messageType = "Error";
    $messageContent = "The email address has already been registered! Please use another email or try to sign in.";
    $action = "view_sign_up.php";
} else if ($type == "signupSucceeded") {
    $messageType = "Succeed";
    $messageContent = 'Sign up succeeded! Please click "DISMISS" to sign in.';
    $action = "view_sign_in.php";
} else if ($type == "serverError") {
    $messageType = "Error";
    $messageContent = "Opps, there's something wrong on the server, please try again later!";
    $action = "/";
} else if ($type == "profileUpdateSuccess") {
    $messageType = "Succeed";
    $messageContent = 'Your profile has been updated successfully! Click "DISMISS" to go back.';
    $action = "view_profile_edit.php";
} else if ($type == "addNeedSuccess") {
    if (isset($_GET["need_id"])) {
        $need_id = $_GET["need_id"];
    }
    $messageType = "Succeed";
    $messageContent = 'You have successfully added a new post, now click "DISMISS" to see your post.';
    $action = "/";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Eswap - <?php echo $class[$messageType]; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <style type="text/css">
        .danger {
            background-color: #F44336;
        }

        .success {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>

<?php include "navbar.php" ?>

<div class="row">
    <div class="col-xs-2"></div>
    <div class="col-xs-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header <?php echo $class[$messageType]; ?>">
                    <h4 class="modal-title"><?php echo $messageType; ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $messageContent; ?></p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-<?php echo $class[$messageType] . "<br />";
                    if (isset($_GET["exception"])) {
                        echo $_GET["exception"];
                    } ?>" href="<?php echo $action; ?>">DISMISS</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-2"></div>
</div>

</body>
</html>