<?php
session_start();
if(isset($_GET["from"])){
    $from = $_GET["from"];
}

if(isset($_GET["unread"])) {
    if($_SESSION["unread_messages_number"]>0){
        $_SESSION["unread_messages_number"]--;
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
        <div class="well col-sm-8 col-md-6">
            <!--            在这里放这个页面的内容-->

        </div>
        <div class="col-sm-2 col-md-3"></div>
    </div>
</div>

</body>
</html>