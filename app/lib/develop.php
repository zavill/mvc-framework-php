<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function func_debug($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
