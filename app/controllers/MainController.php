<?php


namespace app\controllers;

use app\core\Controller;


class MainController extends Controller
{
    public function indexAction()
    {
        $params = $this->model->getNews();
        $this->view->render('Main Page', $params);
    }
}
