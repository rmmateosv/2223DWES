<?php
namespace Repaso;

class Persona
{
    private $nombre, $sexo, $tipo;
    
    public function __construct($nombre, $sexo, $tipo)
    {
        $this->nombre=$nombre;
        $this->sexo=$sexo;
        $this->tipo=$tipo;
    }
    
    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

   
    
    
}

