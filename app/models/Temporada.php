<?php 

use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\Model as Paginator;

class Temporada extends Model
{
    private $id;
    private $numero_temporada;
    private $id_serie;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }



    
    public function getNumero_temporada()
    {
        return $this->numero_temporada;
    }
    public function setNumero_temporada($numero_temporada)
    {
        $this->numero_temporada = $numero_temporada;

        return $this;
    }



    
    public function getId_serie()
    {
        return $this->id_serie;
    }
    public function setId_serie($id_serie)
    {
        $this->id_serie = $id_serie;

        return $this;
    }
}
?>