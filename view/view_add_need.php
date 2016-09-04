<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Add a New Need</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <link type="text/css" href="/css/jquery.dropdown.css" rel="stylesheet"/>
</head>
<body>

<?php include "navbar.php" ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-3"></div>
        <div class="col-sm-6 col-md-6">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-header">I Want to Swap</h1>
                </div>
                <div class="modal-body">
                    <form action="function_add_need.php" method="post">
                        <div class="form-group is-empty">
                            <label for="title" class="col-md-2 control-label">Title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="title"
                                       placeholder="One sentence to describe your need">
                            </div>
                        </div>

                        <div class="form-group is-empty is-fileinput">
                            <label for="inputFile" class="col-md-2 control-label">Photo</label>
                            <div class="col-md-10">
                                <input type="text" readonly="" class="form-control" placeholder="Uploading Photos">
                                <input type="file" id="inputFile" multiple="">
                            </div>
                        </div>

                        <div class="form-group is-empty">
                            <label for="textArea" class="col-md-2 control-label">Description</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" id="textArea"></textarea>
                                <span
                                    class="help-block">Please write something to describe the goods you want to swap.</span>
                            </div>
                        </div>

                        <div class="form-group is-empty">
                            <label for="condition" class="col-md-2 control-label">Condition</label>
                            <div class="col-md-10">
                                <select id="condition" name="firstClass" class="select form-control"
                                        onchange="onChange()">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group is-empty col-md-6">
                            <label for="firstClass">test select</label>
                            <select id="firstClass" name="firstClass" class="select form-control"
                                    onchange="onChange()">
                            </select>
                        </div>

                        <div class="form-group is-empty col-md-6">
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

                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary" data-toggle="modal"
                                    data-target="#simple-dialog">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3 col-md-3"></div>
        </div>
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
        for (var skey in first_secondClass) {
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