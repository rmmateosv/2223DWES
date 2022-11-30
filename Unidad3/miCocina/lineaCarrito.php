<?php
class LineaCarrito{
    private $plato;
    private $cantidad;

    
    
    
    
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
     * @param mixed $plato
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

    function __construct($plato,$cantidad){
        $this->plato=$plato;
        $this->cantidad=$cantidad;
    }
}
?>