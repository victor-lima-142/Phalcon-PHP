<?php
declare(strict_types=1);

use Phalcon\Http\Response;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;

class TemporadaController extends ControllerBase
{
    public function listagemAction()
    {
        $series = Serie::find($this->dispatcher->getParam('id'));
        $temporadas = Temporada::find('idSerie = ' . $this->dispatcher->getParam('id'));
        $this->view->setVars([
            'series' => $series,
            'temporadas' => $temporadas
        ]);
        $this->view->pick('temporada/listar');
    }   

    public function createAction()
    {
        $temporadas = Temporada::find("idSerie = " . $this->dispatcher->getParam('id'));
        $ultimaTemporada = $temporadas->getLast();
        $novaTemporada = new Temporada();
        $novaTemporada->numeroTemporada = $ultimaTemporada->numeroTemporada + 1;
        $novaTemporada->idSerie = $this->dispatcher->getParam('id');
        $novaTemporada->save();

        if (!$novaTemporada || $novaTemporada->id == NULL)
        {
            return $this->response->redirect('/lista-temporadas/serie/' . $this->dispatcher->getParam('id'));
        } else{
            return $this->response->redirect('/lista-temporadas/serie/' . $this->dispatcher->getParam('id'));
        }
    }

    public function deleteAction()
    {
        $temporada = Temporada::find($this->dispatcher->getParam('id'));
        if (!$temporada->delete()) {
            return $this->response->redirect($this->request->getHTTPReferer());
        } else {
            return $this->response->redirect($this->request->getHTTPReferer());
        }
    }

    public function editAction()
    {
        $serie = Temporada::findFirst($this->dispatcher->getParam('idTemporada'));
        $serie->setNumeroTemporada($this->request->getPost('numeroTemporada'));
        $serie->save();

        if (!$serie){
            echo "6";
        } else {
            return $this->response->redirect('/lista-temporadas/serie/' . $this->dispatcher->getParam('idSerie'));
        }
    }
}