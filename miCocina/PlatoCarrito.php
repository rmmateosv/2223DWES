<?php

class PlatoCarrito
{
    private $plato, $cantidad;
    public function __construct($plato, $cantidad)
    {
        $this->plato=$plato;
        $this->cantidad=$cantidad;
    }
    /**
     * @return mixed
     */
    public function getPlato()
    {
        return $this->plato;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $producto
     */
    public function setPlato($plato)
    {
        $this->plato = $plato;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    
}

