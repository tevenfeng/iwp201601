<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Profile Editing</title>
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

        function editStart() {
            document.getElementById("submitBtn").style.visibility = "visible";
            document.getElementById("modifyBtn").style.visibility = "hidden";

            document.getElementById("pwdHide").removeAttribute("disabled");
            var inputs = document.getElementsByTagName("input");
            var input;
            for (var index = 0; index < inputs.length; index++) {
                inputs[index].removeAttribute("disabled");
            }
        }

    </script>
</head>
<body>

<?php include "navbar.php" ?>

<?php

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-4"></div>
        <div class="well col-sm-6 col-md-4">
            <form action="function_profile_edit.php" method="post">
                <h1 class="header">User Information
                </h1>
                <div style="text-align: center;" id="modifyBtn">
                    <a type="button" class="btn btn-primary" onclick="editStart()">
                        Modify
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-lg label-floating is-empty">
                            <label for="nickname" class="control-label">Your nickname</label>
                            <input type="email" class="form-control" id="nickname" disabled="">
                            <p class="help-block">Your nickname cannot be empty.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Gender</label>

                            <div class="col-md-10">
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="genderOptions" id="optionMale" value="0" disabled="">
                                        <span class="circle"></span><span class="check"></span>
                                        Male
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="genderOptions" id="optionFemale" value="1"
                                               disabled="">
                                        <span class="circle"></span><span class="check"></span>
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-lg label-floating is-empty">
                    <label for="password" class="control-label">Your password</label>
                    <div class="row">
                        <div class="col-xs-8">
                            <input type="password" class="form-control" id="password" disabled="">
                        </div>
                        <div class="col-xs-4">
                            <a id="pwdHide" class="btn btn-info" onmousedown="displayPwd()"
                               onmouseup="hidePwd()" disabled="">DISPLAY</a>
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-lg label-floating is-empty">
                    <label for="city" class="control-label">City where you live</label>
                    <input type="text" class="form-control" id="city" disabled="">
                </div>

                <div class="form-group form-group-lg label-floating is-empty">
                    <label for="phone" class="control-label">Your phone number</label>
                    <input type="tel" class="form-control" id="phone" disabled="">
                </div>

                <div style="text-align: center;visibility: hidden;" id="submitBtn">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>
        </div>
        <div class="col-sm-3 col-md-4"></div>
    </div>
</div>


</body>
</html>