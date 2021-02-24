<?php

namespace app\models;

use app\lib\Database;

/**
 * Class MainModel
 */
class MainModel
{
    public function getNews() {
        $db = new Database();
        return $db->query('SELECT * FROM `Articles`;');
    }
}