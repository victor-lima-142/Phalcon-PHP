<?php 

use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\Model as Paginator;

class Episodio extends Model
{
    private $id;
    private $numero;
    private $assistido;
    private $idTemporada;

    public function getIdTemporada()
    {
        return $this->idTemporada;
    }
    public function setIdTemporada($idTemporada)
    {
        $this->idTemporada = $idTemporada;
        return $this;
    }



    public function getAssistido()
    {
        return $this->assistido;
    }
    public function setAssistido($assistido)
    {
        $this->assistido = $assistido;
        return $this;
    }



    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
?>