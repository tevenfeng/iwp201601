<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Needs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
</head>
<body>

<?php
include "navbar.php";
$panel = ["panel-primary", "panel-success", "panel-warning", "panel-danger", "panel-info"];
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

    if (isset($_GET["firstCat"])) {
        $firstCat = $_GET["firstCat"];
        $needs_of_category = $database->query("select user_nickname, 
                                                             needs_information.* 
                                                      from needs_information join users_information 
                                                      where user_id=need_user_id and need_state=0 and need_goods_first_class='" . $firstCat . "';")->fetchAll();

        $need_number = count($needs_of_category);

    } elseif (isset($_GET["secondCat"])) {
        $secondCat = $_GET["secondCat"];
        $needs_of_category = $database->query("select user_nickname, 
                                                             needs_information.* 
                                                      from needs_information join users_information 
                                                      where user_id=need_user_id and need_state=0 and need_goods_second_class='" . $secondCat . "';")->fetchAll();
        $need_number = count($needs_of_category);
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
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <?php include "categoryNav.php"; ?>
                </div>
            </div>
            <br/>
        </div>
        <div class="well col-sm-8 col-md-6" style="min-height: 90%">
            <!--            在这里放这个页面的内容-->
            <div class="row">
                <?php
                for ($i = 0; $i < $need_number; $i++) {
                    ?>
                    <div class="col-md-6">
                        <a href="#">
                            <div class="panel <?php echo $panel[rand(0, 4)]; ?>">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $needs_of_category[$i]["user_nickname"] . ': '; ?>
                                        <?php echo $needs_of_category[$i]["need_title"]; ?>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div
                                            class="col-md-6"><?php echo substr($needs_of_category[$i]["need_goods_description"], 0, 100) . '……'; ?></div>
                                        <div
                                            class="col-md-6"><?php echo $needs_of_category[$i]["need_goods_picture_path"]; ?></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-2 col-md-3"></div>
    </div>
</div>

</body>
</html>