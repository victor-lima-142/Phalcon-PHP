<?php

use Phalcon\Http\Response;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;

class SerieController extends Controller
{
    public function listagemAction()
    {
        $series = Serie::find();
        $this->view->setVar('series', $series);
        $this->view->pick('serie/listar');
    }   
}

?>


