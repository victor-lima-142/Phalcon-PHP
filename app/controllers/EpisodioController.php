<?php
declare(strict_types=1);

use Phalcon\Http\Response;
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;

class EpisodioController extends ControllerBase
{
    public function assisteAction()
    {
        $episodio = Episodio::find($this->dispatcher->getParam('id'))->getLast();
        if (intval($episodio->assistido) == 0) {
            $episodio->assistido = 1;
            $episodio->save();
            return $this->response->redirect($this->request->getHTTPReferer());
        } else if (intval($episodio->assistido) == 1) {
            $episodio->assistido = 0;
            $episodio->save();
            
            return $this->response->redirect($this->request->getHTTPReferer());
        }
    }   

    public function createAction()
    {
        $episodios = Episodio::find("idTemporada = " . $this->dispatcher->getParam('id'));
        $ultimoepisodio = $episodios->getLast();
        $novoepisodio = new episodio();
        $novoepisodio->numero = $ultimoepisodio->numero + 1;
        $novoepisodio->assistido = intval('0');
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
}