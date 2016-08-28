<?php

$class=[
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
}else if($type == "signupSucceeded"){
    $messageType = "Succeed";
    $messageContent = 'Sign up succeeded! Please click "DISMISS" to sign in.';
    $action = "view_sign_in.php";
}else if($type="serverError"){
    $messageType = "Error";
    $messageContent = "Opps, there's something wrong on the server, please try again later!";
    $action = "/";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Eswap - <?php echo $class[$messageType]; ?></title>
    <style type="text/css">
        .danger {
            background-color: #F44336;
        }

        .success{
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
                    <button type="button" class="close" aria-hidden="true">×</button>
                    <h4 class="modal-title"><?php echo $messageType; ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $messageContent; ?></p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-<?php echo $class[$messageType]; ?>" href="<?php echo $action; ?>">DISMISS</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-2"></div>
</div>

</body>
</html>