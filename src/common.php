<?php
session_start();


require_once 'database.php';
require_once 'model/function.php';

if (isset($_SESSION['token'])) {
    token();
}
