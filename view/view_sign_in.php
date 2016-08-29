<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <script>
        function displayPwd() {
            var passwordInput = document.getElementById("password");

            if (passwordInput.getAttribute("type") == "password") {
                passwordInput.setAttribute("type", "text");
            }
        }

        function hidePwd() {
            var passwordInput = document.getElementById("password");

            if (passwordInput.getAttribute("type") == "text") {
                passwordInput.setAttribute("type", "password");
            }
        }
    </script>
</head>
<body>

<?php include "navbar.php" ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-4"></div>
        <div class="col-sm-8 col-md-4">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-header">Sign In</h1>
                </div>
                <div class="modal-body">
                    <form id="signForm" name="signForm" action="function_sign_in.php" method="post">
                        <div class="form-group label-floating is-empty">
                            <label for="mail" class="control-label">Your E-mail</label>
                            <input type="email" class="form-control" id="mail" name="mail" required>
                            <p class="help-block">Turn red if not a valid email address!</p>
                        </div>

                        <div class="form-group label-floating is-empty">
                            <label for="password" class="control-label">Your Password</label>
                            <div class="row">
                                <div class="col-xs-8">
                                    <input type="password" class="form-control" id="password" name="pwd" required>
                                </div>
                                <div class="col-xs-4">
                                    <a id="pwdHide" class="btn btn-info" onmousedown="displayPwd()"
                                       onmouseup="hidePwd()">DISPLAY</a>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div style="text-align: center;">
                                <input type="submit" class="btn btn-primary" value="Sign In"/>
                            </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-2 col-md-4"></div>
        </div>
    </div>
</div>

</body>
</html>
