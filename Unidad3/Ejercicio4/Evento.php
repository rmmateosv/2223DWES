<?php
namespace Ejercicio4;
class Evento
{
    private $fecha, $hora, $asunto;
    
    public function __construct($fecha, $hora, $asunto)
    {
        $this->fecha=$fecha;
        $this->hora=$hora;
        $this->asunto=$asunto;
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
    public function getAsunto()
    {
        return $this->asunto;
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
     * @param mixed $asunto
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;
    }


    
}

