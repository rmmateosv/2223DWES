<?php
class Vivienda{
    private $tipo;
    private $zona;
    private $calle;
    private $nh;
    private $precio;
    private $metros;
    private $extras;
    private $observaciones;
    
    
    
    function __construct($tipo,$zona,$calle,$nh,$precio,$metros,$extras,$observaciones){
        $this->tipo=$tipo;
        $this->zona=$zona;
        $this->calle=$calle;
        $this->nh=$nh;
        $this->precio=$precio;
        $this->metros=$metros;
        $this->extras=$extras;
        $this->observaciones=$observaciones;
    }
    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @return mixed
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @return mixed
     */
    public function getNh()
    {
        return $this->nh;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @return mixed
     */
    public function getMetros()
    {
        return $this->metros;
    }

    /**
     * @return mixed
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @param mixed $zona
     */
    public function setZona($zona)
    {
        $this->zona = $zona;
    }

    /**
     * @param mixed $calle
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    /**
     * @param mixed $nh
     */
    public function setNh($nh)
    {
        $this->nh = $nh;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @param mixed $metros
     */
    public function setMetros($metros)
    {
        $this->metros = $metros;
    }

    /**
     * @param mixed $extras
     */
    public function setExtras($extras)
    {
        $this->extras = $extras;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }


    
    
    
}
?>