<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap-material-design.css">
<link rel="stylesheet" type="text/css" href="/css/ripples.min.css">
<link rel='stylesheet' type='text/css' href='/css/sm-core-css.css'>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/material.min.js"></script>
<script type="text/javascript" src="/js/ripples.min.js"></script>
<script type="text/javascript" src="/js/jquery.smartmenus.js"></script>

<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="navbar navbar-warning" role="navigation">
            <div class="col-sm-2 col-md-3"></div>
            <div class="container-fluid col-sm-8 col-md-6">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-warning-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Eswap</a>
                </div>
                <div class="navbar-collapse collapse navbar-warning-collapse">

                    <?php
                    if (!isset($_SESSION["login_nickname"])) {
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/view/view_sign_in.php">Sign In</a></li>
                            <li><a href="/view/view_sign_up.php">Sign Up</a></li>
                        </ul>
                        <?php
                    } else {
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/view/view_station_message.php">Requests <span
                                        class="badge"><?php if ($_SESSION["unread_messages_number"] > 0) {
                                            echo $_SESSION["unread_messages_number"];
                                        } ?></span></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle"
                                   href="javascript:void(0)"
                                   data-toggle="dropdown"
                                   data-target="#"><?php echo $_SESSION["login_nickname"]; ?>
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/view/view_add_need.php">Post My Need</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/view/view_profile_edit.php">Your Profile</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Needs and Deals</li>
                                    <li><a href="/view/view_uncompleted_needs.php">Unfinished Needs</a></li>
                                    <li><a href="/view/view_completed_needs.php">Finished Needs</a></li>
<!--                                    <li><a href="/view/view_trading_information.php">Your Deals</a></li>-->
                                    <li class="divider"></li>
                                    <li><a href="/view/function_logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-2 col-md-3"></div>
        </div>
    </div>
</div>

<script>
    $.material.init();
</script>