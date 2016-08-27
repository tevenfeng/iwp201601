<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap-material-design.css">
<link rel="stylesheet" type="text/css" href="/css/ripples.min.css">
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/material.min.js"></script>
<script type="text/javascript" src="/js/ripples.min.js"></script>

<?php session_start(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="navbar navbar-warning">
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
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle"
                               href="http://fezvrasta.github.io/bootstrap-material-design/bootstrap-elements.html"
                               data-toggle="dropdown" data-target="#">Catogary
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)">Action</a></li>
                                <li><a href="javascript:void(0)">Another action</a></li>
                                <li><a href="javascript:void(0)">Something else here</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Dropdown header</li>
                                <li><a href="javascript:void(0)">Separated link</a></li>
                                <li><a href="javascript:void(0)">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>

                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input class="form-control col-sm-8" type="text" placeholder="Search">
                        </div>
                    </form>

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
                            <li><a href="/view/view_profile.php">Welcome, <?php echo $_SESSION["login_nickname"]; ?>
                                    !</a></li>
                            <li><a href="/view/function_logout.php">Logout</a></li>
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