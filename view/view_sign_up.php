<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Sign Up</title>
    <script>
        function displayPwd(){
            var passwordInput = document.getElementById("password");

            if(passwordInput.getAttribute("type")=="password"){
                passwordInput.setAttribute("type", "text");
            }
        }

        function hidePwd(){
            var passwordInput = document.getElementById("password");

            if(passwordInput.getAttribute("type")=="text"){
                passwordInput.setAttribute("type", "password");
            }
        }
    </script>
</head>
<body>

<?php include "navbar.php" ?>

<div class="row">
    <div class="col-xs-3"></div>
    <div class="col-xs-6">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-header">Sign Up</h1>
            </div>
            <div class="modal-body">
                <form action="function_sign_up.php" method="post">
                    <div class="form-group label-floating is-empty">
                        <label for="nickname" class="control-label">Your nickname</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" required>
                    </div>

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
                                <a id="pwdHide" class="btn btn-info" onmousedown="displayPwd()" onmouseup="hidePwd()">DISPLAY</a>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-primary">
                            Sign Up
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xs-3"></div>
    </div>
</div>

</body>
</html>