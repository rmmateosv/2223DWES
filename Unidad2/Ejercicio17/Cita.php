<?php
class Cita{
    private $fecha;
    private $hora;
    private $nombre;
    private $tipoServicio;
    
    function __construct($fecha,$hora,$nombre,$tipoServicio){
        $this->fecha=$fecha;
        $this->hora=$hora;
        $this->nombre=$nombre;
        $this->tipoServicio=$tipoServicio;
    }
    
    function textoTipoServicio(){
        if($this->tipoServicio=='CS'){
            return 'Corte Señora';
        }
        elseif($this->tipoServicio=='CC'){
            return 'Corte Caballero';
        }
        elseif($this->tipoServicio=='M'){
            return 'Mechas';
        }
        elseif($this->tipoServicio=='T'){
            return 'Tinte';
        }
    }
    function tiempoTipoServicio(){
        if($this->tipoServicio=='CS'){
            return 30;
        }
        elseif($this->tipoServicio=='CC'){
            return 15;
        }
        elseif($this->tipoServicio=='M'){
            return 180;
        }
        elseif($this->tipoServicio=='T'){
            return 120;
        }
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
    public function getHora()
    {
        return $this->hora;
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
    public function getTipoServicio()
    {
        return $this->tipoServicio;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $tipoServicio
     */
    public function setTipoServicio($tipoServicio)
    {
        $this->tipoServicio = $tipoServicio;
    }

    
    
    
}
?>