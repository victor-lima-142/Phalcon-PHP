<?php
declare(strict_types=1);

use Phalcon\Http\Response;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;

class EpisodioController extends ControllerBase
{
    public function assisteAction()
    {
        $episodio = Episodio::find($this->dispatcher->getParam('id'));
        var_dump($episodio->assistido);
        die;
        if ($episodio->assistido == 0) {
            $episodio->assistido == 1;
            return $this->response->redirect($this->request->getHTTPReferer());
        } else if ($episodio->assistido == 1) {
            $episodio->assistido == 0;
            return $this->response->redirect($this->request->getHTTPReferer());
        }
    }   

    public function createAction()
    {
        $episodios = Episodio::find("idTemporada = " . $this->dispatcher->getParam('id'));
        $ultimoepisodio = $episodios->getLast();
        $novoepisodio = new episodio();
        $novoepisodio->numero = $ultimoepisodio->numero + 1;
        $novoepisodio->assistido = 0;
        $novoepisodio->idTemporada = $this->dispatcher->getParam('id');
        $novoepisodio->save();

        if (!$novoepisodio || $novoepisodio->id == NULL)
        {
            return $this->response->redirect($this->request->getHTTPReferer());
        } else{
            return $this->response->redirect($this->request->getHTTPReferer());
        }
    }

    public function deleteAction()
    {
        $episodio = Episodio::find($this->dispatcher->getParam('id'));
        if (!$episodio->delete()) {
            return $this->response->redirect($this->request->getHTTPReferer());
        } else {
            return $this->response->redirect($this->request->getHTTPReferer());
        }
    }

    public function editAction()
    {
        $serie = Episodio::findFirst($this->dispatcher->getParam('idepisodio'));
        $serie->setnumero($this->request->getPost('numero'));
        $serie->save();

        if (!$serie){
            echo "6";
        } else {
            return $this->response->redirect('/lista-episodios/serie/' . $this->dispatcher->getParam('idSerie'));
        }
    }
}