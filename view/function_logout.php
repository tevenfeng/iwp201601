<?php
/**
 * Created by PhpStorm.
 * User: fengd
 * Date: 2016/8/27 0027
 * Time: 11:26
 */
session_start();
session_destroy();
header("Location: /");