<?php
declare(strict_types=1);

use Phalcon\Http\Response;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;

class SerieController extends ControllerBase
{
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

    public function deleteAction()
    {
        $serie = Serie::find($this->dispatcher->getParam('id'));
        if (!$serie->delete()) {
            return $this->response->redirect('/');
        } else {
            return $this->response->redirect('/listar-series');
        }
    }

    public function editAction()
    {
        $serie = Serie::findFirst($this->dispatcher->getParam('id'));
        $serie->setNome($this->request->getPost('nome'));
        $serie->setDescricao($this->request->getPost('descricao'));
        $serie->setAvaliacao($this->request->getPost('avaliacao'));
        $serie->save();

        if (!$serie){
            echo "6";
        } else {
            return $this->response->redirect('/listar-series');
        }
    }
}