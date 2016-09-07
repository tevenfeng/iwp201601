<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Your choice to swap things</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <script type="text/javascript" src="/js/jquery.smartmenus.js"></script>
    <link rel='stylesheet' type='text/css' href='/css/sm-blue/sm-blue.css'>
</head>
<body>

<?php
include "view/navbar.php";

$panel = ["panel-primary", "panel-success", "panel-warning", "panel-danger", "panel-info"];

require_once "medoo.php";
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

    $first_classes = $database->select("category_information", ["category_first_class"]);

    $first_class = array();

    foreach ($first_classes as $key => $value) {
        foreach ($value as $class => $sclass) {
            $first_class[$sclass] = array();
        }
    }

    foreach ($first_class as $key => $item) {
        $arr = $database->select("category_information", ["category_second_class"], ["category_first_class" => $key]);
        foreach ($arr as $class => $sclass) {
            foreach ($sclass as $num => $want)
                array_push($first_class[$key], $want);
        }
    }

    $most_recent_need_information = $database->query("select user_nickname, 
                                                             needs_information.* 
                                                      from needs_information join users_information 
                                                      where user_id=need_user_id and need_state=0
                                                      order by UNIX_TIMESTAMP(need_start_time)  desc limit 0,8;")->fetchAll();

    $need_number = count($most_recent_need_information);

    $_SESSION["category"] = $first_class;

    $category_information = $_SESSION["category"];

} catch (Exception $exception) {
    header("Location: /view/view_message_page.php?type=serverError");
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-3">
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <div>
                        <ul id="main-menu" class="sm sm-blue sm-vertical">
                            <?php
                            foreach ($category_information as $first_class => $second_classes) {
                                ?>
                                <li>
                                    <a href="/view/view_search_needs.php?firstCat=<?php echo $first_class; ?>"><?php echo $first_class; ?></a>
                                    <ul>
                                        <?php
                                        foreach ($second_classes as $key => $value) {
                                            ?>
                                            <li>
                                                <a href="/view/view_search_needs.php?secondCat=<?php echo $value; ?>"><?php echo $value; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                        <script>
                            $(function () {
                                $('#main-menu').smartmenus();
                            });
                        </script>
                    </div>
                </div>
            </div>
            <br/>
        </div>
        <div class="well col-sm-8 col-md-6">
            <!--            主页内容-->
            <div class="row">
                <?php
                for ($i = 0; $i < $need_number; $i++) {
                    $pictures = json_decode($most_recent_need_information[$i]["need_goods_picture_path"], true);
                    ?>
                    <div class="col-md-6">
                        <a href="/view/view_goods_information.php?need_id=<?php echo $most_recent_need_information[$i]["need_id"]; ?>">
                            <div class="panel <?php echo $panel[rand(0, 4)]; ?>">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $most_recent_need_information[$i]["user_nickname"] . ': '; ?>
                                        <?php echo $most_recent_need_information[$i]["need_title"]; ?>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <img src="<?php echo $pictures[0]; ?>" height="300px;"/>
                                    </div>
                                    <div>
                                        <?php echo substr($most_recent_need_information[$i]["need_goods_description"], 0, 100) . '……'; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-2 col-md-3"></div>
</div>

</body>
</html>