<?php 

use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\Model as Paginator;

class Temporada extends Model
{
    private $id;
    private $numeroTemporada;
    private $idSerie;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getNumeroTemporada()
    {
        return $this->numeroTemporada;
    }
    
    public function setNumeroTemporada($numeroTemporada)
    {
        $this->numeroTemporada = $numeroTemporada;

        return $this;
    }

    
    public function getIdSerie()
    {
        return $this->idSerie;
    }
    public function setIdSerie($idSerie)
    {
        $this->idSerie = $idSerie;

        return $this;
    }
}
?>