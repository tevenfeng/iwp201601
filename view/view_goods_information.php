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

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-3">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <?php include "categoryNav.php"; ?>
                </div>
            </div>
            <br />
        </div>
        <div class="well col-sm-8 col-md-6">
<!--            在这里放这个页面的内容-->
            <h1>Title</h1>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Picture</h3>
                </div>
                <div class="panel-body">
                    <img src="1.jpg" alt="goods_picture">
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">User</h3>
                </div>
                <div class="panel-body">
                    user_name
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Start time</h3>
                </div>
                <div class="panel-body">
                    start_time
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Start time</h3>
                </div>
                <div class="panel-body">
                    start_time
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">State</h3>
                </div>
                <div class="panel-body">
                    <span class="label label-default">Completed</span>
                    <span class="label label-success">Uncompleted</span>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Description</h3>
                </div>
                <div class="panel-body">
                    description
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Quality</h3>
                </div>
                <div class="panel-body">
                    quality
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Class</h3>
                </div>
                <div class="panel-body">
                    first_class second_class
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">What I need</h3>
                </div>
                <div class="panel-body">
                    goal_goods
                </div>
            </div>

        </div>
        <div class="col-sm-2 col-md-3"></div>
    </div>
</div>

</body>
</html>