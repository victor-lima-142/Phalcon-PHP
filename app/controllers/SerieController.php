<?php
declare(strict_types=1);

use Phalcon\Http\Response;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;

class SerieController extends ControllerBase
{

    public function testeAction()
    {
        echo "<h1>Olá mundo</h1>";
    }

    public function listagemAction()
    {
        $series = Serie::find();
        $this->view->setVar('series', $series);
        $this->view->pick('serie/listar');
    }   

    public function createAction()
    {
        $serieNova = new Serie();
        $serieNova->nome = $this->request->getPost('nome');
        $serieNova->descricao = $this->request->getPost('descricao');
        $serieNova->avaliacao = $this->request->getPost('avaliacao');
        $serieNova->save();
        $this->flash->success('Adicionado');
        return $this->response->redirect('/listar-series');
    }

}