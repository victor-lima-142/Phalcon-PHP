<?php 

use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\Model as Paginator;

class Episodio extends Model
{
    private $id;
    private $numero;
    private $nome;
    private $id_temporada;

    public function getId_temporada()
    {
        return $this->id_temporada;
    }
    public function setId_temporada($id_temporada)
    {
        $this->id_temporada = $id_temporada;

        return $this;
    }

    

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;

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