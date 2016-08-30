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

<?php
include "view/navbar.php";

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

    $_SESSION["category"] = $first_class;

} catch (Exception $exception) {
    header("Location: view_message_page.php?type=serverError");
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-3">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <?php include_once "view/categoryNav.php"; ?>
                </div>
            </div>
            <br/>
        </div>
        <div class="well col-sm-8 col-md-6">

            <!--            主页内容-->

        </div>
    </div>
    <div class="col-sm-2 col-md-3"></div>
</div>

</body>
</html>