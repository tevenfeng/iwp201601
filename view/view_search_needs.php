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

if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
//设置为第一页
    $page = 1;
}

$start = 6 * $page - 6;
$end = $start + 6;

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
                                                      where user_id=need_user_id and need_state=0 and need_goods_first_class='" . $firstCat . "'
                                                      limit " . $start . "," . $end . ";")->fetchAll();

        $need_number = count($needs_of_category);

    } elseif (isset($_GET["secondCat"])) {
        $secondCat = $_GET["secondCat"];
        $needs_of_category = $database->query("select user_nickname, 
                                                             needs_information.* 
                                                      from needs_information join users_information 
                                                      where user_id=need_user_id and need_state=0 and need_goods_second_class='" . $secondCat . "'
                                                      limit " . $start . "," . $end . ";")->fetchAll();
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
        <div class="well col-sm-8 col-md-3" style="min-height: 90%">
            <!--            在这里放这个页面的内容-->
            <?php
            if (isset($_GET["firstCat"])) {
                ?>
                <ul class="pager">
                    <li class="previous <?php if ($page == 1) {
                        echo "disabled";
                    } ?>"><a
                            href="view_search_needs.php?page=<?php echo $page - 1; ?>&firstCat=<?php echo $firstCat; ?>">←
                            Newer</a></li>
                    <li class="next <?php if ($page == 10) {
                        echo "disabled";
                    } ?>"><a class="withripple"
                             href="view_search_needs.php?page=<?php echo $page + 1; ?>&firstCat=<?php echo $firstCat; ?>">Older
                            →</a>
                    </li>
                </ul>
                <?php
            } else if (isset($_GET["secondCat"])) {
                ?>
                <ul class="pager">
                    <li class="previous <?php if ($page == 1) {
                        echo "disabled";
                    } ?>"><a
                            href="view_search_needs.php?page=<?php echo $page - 1; ?>&secondCat=<?php echo $secondCat; ?>">←
                            Newer</a></li>
                    <li class="next <?php if ($page == 10) {
                        echo "disabled";
                    } ?>"><a class="withripple"
                             href="view_search_needs.php?page=<?php echo $page + 1; ?>&secondCat=<?php echo $secondCat; ?>">Older
                            →</a>
                    </li>
                </ul>
                <?php
            }
            ?>
            <div class="row">
                <?php
                for ($i = 0; $i < $need_number; $i = $i + 2) {
                    $pictures = json_decode($needs_of_category[$i]["need_goods_picture_path"], true);
                    ?>
                    <div class="col-md-6">
                        <a href="view_goods_information.php?need_id=<?php echo $needs_of_category[$i]["need_id"]; ?>">
                            <div class="panel <?php echo $panel[rand(0, 4)]; ?>" style="height: 450px;">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $needs_of_category[$i]["user_nickname"] . ': '; ?>
                                        <?php echo $needs_of_category[$i]["need_title"]; ?>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div style="text-align: center; overflow: hidden; height: 320px;">
                                        <img src="<?php echo $pictures[0]; ?>"
                                             style="max-height: 300px; max-width: 300px;"/>
                                    </div>
                                    <div>
                                        <?php echo substr($needs_of_category[$i]["need_goods_description"], 0, 100) . '……'; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    if (isset($needs_of_category[$i + 1])) {
                        $pictures = json_decode($needs_of_category[$i]["need_goods_picture_path"], true);
                        ?>
                        <div class="col-md-6">
                            <a href="view_goods_information.php?need_id=<?php echo $needs_of_category[$i + 1]["need_id"]; ?>">
                                <div class="panel <?php echo $panel[rand(0, 4)]; ?>" style="height: 450px;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo $needs_of_category[$i + 1]["user_nickname"] . ': '; ?>
                                            <?php echo $needs_of_category[$i + 1]["need_title"]; ?>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div style="text-align: center; overflow: hidden; height: 320px;">
                                            <img src="<?php echo $pictures[0]; ?>"
                                                 style="max-height: 300px; max-width: 300px;"/>
                                        </div>
                                        <div>
                                            <?php echo substr($needs_of_category[$i + 1]["need_goods_description"], 0, 100) . '……'; ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-sm-2 col-md-2"></div>
    </div>
</div>

</body>
</html>