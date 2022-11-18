<?php
namespace taller;

class Reparacion
{
    private $id, $coche, $fecha, $tiempo, $pagado, $piezas;
    
    public function __construct()
    {}
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCoche()
    {
        return $this->coche;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return mixed
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * @return mixed
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * @return mixed
     */
    public function getPiezas()
    {
        return $this->piezas;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $coche
     */
    public function setCoche($coche)
    {
        $this->coche = $coche;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @param mixed $tiempo
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;
    }

    /**
     * @param mixed $pagado
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;
    }

    /**
     * @param mixed $piezas
     */
    public function setPiezas($piezas)
    {
        $this->piezas = $piezas;
    }

   
    
    
}

