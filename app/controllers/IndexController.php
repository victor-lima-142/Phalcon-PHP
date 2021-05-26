<?php

use Phalcon\Http\Response;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $series = Serie::find();
        $this->view->setVar('series', $series);
        $this->view->pick('serie/listar');
    }   
}

?>