<!DOCTYPE html>
<html>
<head>
    <title>Eswap - Add a New Need</title>
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
                                <input type="text" class="form-control" id="title" placeholder="Title">
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
                                <span class="help-block">Please write something to describe your goods.</span>
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="select111" class="col-md-2 control-label">Condition</label>
                            <div class="col-md-10">
                                <select id="select111" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="select111" class="col-md-2 control-label">Class</label>
                            <div class="col-md-10">
                                <select id="select111" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="col-xs-4"></div>
                        </div>
                        <button type="submit" class="btn btn-primary" data-toggle="modal"
                                data-target="#simple-dialog" style="text-align: center;">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-sm-3 col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>