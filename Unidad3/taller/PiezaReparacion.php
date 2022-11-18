<?php
namespace taller;

class PiezaReparacion
{
    private $rep, $pieza, $importe, $cantidad;
    
    public function __construct()
    {}
    
    
    /**
     * @return mixed
     */
    public function getRep()
    {
        return $this->rep;
    }

    /**
     * @return mixed
     */
    public function getPieza()
    {
        return $this->pieza;
    }

    /**
     * @return mixed
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $rep
     */
    public function setRep($rep)
    {
        $this->rep = $rep;
    }

    /**
     * @param mixed $pieza
     */
    public function setPieza($pieza)
    {
        $this->pieza = $pieza;
    }

    /**
     * @param mixed $importe
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    
 
    
    
}

