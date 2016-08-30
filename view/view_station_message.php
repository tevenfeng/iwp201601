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

<?php include "navbar.php" ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-3">
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <div class="card">
                        <ul class="nav nav-tabs nav-stacked" style="margin-bottom: 15px;">
                            <li class="active"><a href="#unread" data-toggle="tab">Unread <span
                                        class="badge"><?php echo $_SESSION["unread_messages_number"]; ?></span></a></li>
                            <li><a href="#all" data-toggle="tab">All</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="well col-sm-8 col-md-6">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="unread">
                    <div class="list-group">
                        <a href="#">
                            <div class="list-group-item">
                                <div class="row-content">
                                    <div class="action-secondary"><i class="material-icons">info</i></div>
                                    <h4 class="list-group-item-heading">Tile with an icon</h4>

                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget
                                        metus.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade" id="all">
                    <div class="list-group">
                        <a href="#">
                            <div class="list-group-item">
                                <div class="row-content">
                                    <div class="action-secondary"><i class="material-icons">info</i></div>
                                    <h4 class="list-group-item-heading">Tile with an icon</h4>

                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget
                                        metus.</p>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="list-group-item">
                                <div class="row-content">
                                    <h4 class="list-group-item-heading">Tile with an icon</h4>

                                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget
                                        metus.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-md-3"></div>
    </div>
</div>

</body>
</html>