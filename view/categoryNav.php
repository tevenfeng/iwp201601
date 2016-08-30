<?php
$category_information = $_SESSION["category"];
?>

<script type="text/javascript" src="/js/jquery.smartmenus.js"></script>
<link rel='stylesheet' type='text/css' href='/css/sm-blue/sm-blue.css'>
<div>
    <ul id="main-menu" class="sm sm-blue sm-vertical">
        <?php
        foreach ($category_information as $first_class => $second_classes) {
        ?>
        <li><a href="#"><?php echo $first_class; ?></a>
            <ul>
                <?php
                foreach ($second_classes as $key => $value){
                ?>
                <li><a href="#"><?php echo $value; ?></a></li>
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