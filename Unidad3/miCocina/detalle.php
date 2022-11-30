<?php
class LineaPedido{
    private $pedido;
    private $linea;
    private $plato;
    private $cantidad;
    private $precioU;

    
    /**
     * @return mixed
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * @return mixed
     */
    public function getLinea()
    {
        return $this->linea;
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
     * @return mixed
     */
    public function getPrecioU()
    {
        return $this->precioU;
    }

    /**
     * @param mixed $pedido
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * @param mixed $linea
     */
    public function setLinea($linea)
    {
        $this->linea = $linea;
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

    /**
     * @param mixed $precioU
     */
    public function setPrecioU($precioU)
    {
        $this->precioU = $precioU;
    }

    function __construct($pedido,$linea,$plato,$cantidad,$precioU){
        $this->pedido=$pedido;
        $this->linea=$linea;
        $this->plato=$plato;
        $this->cantidad=$cantidad;
        $this->precioU=$precioU;
    }
}
?>