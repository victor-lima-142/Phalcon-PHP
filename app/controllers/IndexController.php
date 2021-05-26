<?php

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->setContent(
            "<h1>hello</h1>"
        );
        $this->view->pick('teste/teste');
    }
}