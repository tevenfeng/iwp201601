<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Your choice to swap things</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <link type="text/css" href="/css/jquery.dropdown.css" rel="stylesheet"/>
</head>
<body>

<?php include "navbar.php"; ?>

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
        <div class="col-sm-8 col-md-6">
            <div class="form-group">
                <label for="firstClass">test select</label>
                <select id="firstClass" name="firstClass" class="select form-control" onchange="onChange()">
                </select>
            </div>

            <div class="form-group">
                <label for="secondClass">test select</label>
                <select id="secondClass" name="secondClass" class="select form-control">
                </select>
            </div>

            <script src="/js/jquery.dropdown.js"></script>
            <script>
                $.material.init();
                $(document).ready(function () {
                    $(".select").dropdown({"optionClass": "withripple"});
                });
                $().dropdown({autoinit: "select"});
            </script>
        </div>
        <div class="col-sm-2 col-md-3"></div>
    </div>
</div>

<script>
    test = <?php echo json_encode($_SESSION["category"]); ?>;

    for (var key in test) {
        var option = document.createElement("OPTION");
        option.value = key;
        option.text = key;

        document.getElementById("firstClass").add(option);
    }

    for (var key in test) {
        var first_secondClass = test[key];
        for(var skey in first_secondClass){
            var option = document.createElement("OPTION");
            option.value = first_secondClass[skey];
            option.text = first_secondClass[skey];

            document.getElementById("secondClass").add(option);
        }
        break;
    }

    function onChange() {
        var select = document.getElementById("secondClass");
        var length = select.options.length;

        for (i = length - 1; i >= 0; i--) {
            select.options[i] = null;
        }

        secondClasses = test[document.getElementById("firstClass").value];

        for (var skey in secondClasses) {
            var option = document.createElement("OPTION");
            option.value = secondClasses[skey];
            option.text = secondClasses[skey];

            document.getElementById("secondClass").add(option);
        }
    }
</script>

</body>
</html>