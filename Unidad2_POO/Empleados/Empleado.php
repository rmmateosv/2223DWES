<?php
class Empleado{
    private $nss;
    private $nombre;
    private $telefonos;
    private $departamento;
    
    /**
     * @return mixed
     */
    public function getNss()
    {
        return $this->nss;
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
    public function getTelefonos()
    {
        return $this->telefonos;
    }

    /**
     * @return mixed
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * @param mixed $nss
     */
    public function setNss($nss)
    {
        $this->nss = $nss;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $telefonos
     */
    public function setTelefonos($telefonos)
    {
        $this->telefonos = $telefonos;
    }

    /**
     * @param mixed $departamento
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }

    function __construct($nss, $nombre, $telefonos, $departamento){
        $this->nss=$nss;
        $this->nombre = $nombre;
        $this->telefonos = $telefonos;
        $this->departamento = $departamento;
    }
    
    
    
    
 }
?>
