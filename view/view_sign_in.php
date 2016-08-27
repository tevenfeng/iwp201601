<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Sign In</title>
</head>
<body>

<?php include "navbar.php" ?>

<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-header">Sign In</h1>
            </div>
            <div class="modal-body">
                <form action="function_sign_in.php" method="post">
                    <div class="form-group label-floating is-empty">
                        <label for="mail" class="control-label">Your E-mail</label>
                        <input type="email" class="form-control" id="mail" name="mail">
                        <p class="help-block">Turn red if not a valid email address!</p>
                    </div>

                    <div class="form-group label-floating is-empty">
                        <label for="password" class="control-label">Your Password</label>
                        <input type="password" class="form-control" id="password" name="pwd">
                    </div>
                    <div class="row">
                        <div class="col-xs-4"></div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary" data-toggle="modal"
                                    data-target="#simple-dialog">
                                Sign in
                            </button>
                        </div>
                        <div class="col-xs-4"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xs-4"></div>
    </div>
</div>

</body>
</html>